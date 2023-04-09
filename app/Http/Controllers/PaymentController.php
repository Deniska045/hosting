<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use YooKassa\Client;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class PaymentController extends Controller
{
    private $shopId;
    private $secretKey;

    public function __construct()
    {
        $this->shopId = env("SHOPID");
        $this->secretKey = env("SECRETKEY");
    }

    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            "category" => 'array'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = $validator->validated()["category"] ?? ['pending','pay', 'reject'];

        return Payment::whereIn('status', $category)->get();
    }


    public function handleNotification(Request $request)
    {
        $requestBody = $request->all();

        // Обновляем статус оплаты в соответствии с полученной информацией
        try {
            $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
                ? new NotificationSucceeded($requestBody)
                : new NotificationWaitingForCapture($requestBody);
        } catch (Exception $e) {
            // Обработка ошибок при неверных данных
            Log::error('YooKassa', ["error" => $e]);
        }

        $payment = $notification->getObject();
        $item = Payment::where("transaction_id", $payment->id)->first();

        if ($item) {
            $item->income_amount = $payment->income_amount->getValue();
            $item->payment_method = $payment->payment_method->getType();
            $item->test = $payment->test;

            switch ($payment->getStatus()) {
                case 'succeeded':
                    // Обработка успешной оплаты
                    $item->status = "pay";
                    break;
                default:
                    // Обработка других статусов оплаты
                    $item->status = "reject";
                    break;
            }

            $item->save();
        } else {
            Log::error("transaction not found", ["id" => $payment->getId()]);
        }

        return response('OK');
    }

    public function store($params)
    {
        $validator = Validator::make($params, [
            "url" => "required|url",
            "price" => "required|numeric|min:0",
            "order_id" => "required|integer|exists:orders,id",
            "user" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        $item = new Payment();
        $item->user_id = $validatedData["user"]->id;
        $item->order_id = $validatedData["order_id"];
        $item->amount = $validatedData["price"];

        $client = new Client();
        $client->setAuth($this->shopId, $this->secretKey);
        $payment = $client->createPayment(
            array(
                'amount' => array(
                    'value' => $validatedData["price"],
                    'currency' => 'RUB',
                ),
                'confirmation' => array(
                    'type' => 'redirect',
                    'return_url' => $validatedData["url"]
                ),
                'capture' => true,
                'description' => 'Оплата заказа № ' . $validatedData["order_id"] . " для " . $validatedData["user"]->email,
            ),
            uniqid('', true)
        );
        $paymentLink = $payment->getConfirmation();

        // TODO save to database payment row
        if ($payment) {
            $item->transaction_id = $payment->getId();
            $item->save();
        }

        return $paymentLink->getConfirmationUrl();
    }




//    public function update(Request $request, Payment $payment) {
//        $validator = Validator::make($request->all(), [
//            'user_id' => 'nullable|exists:users,id',
//            'amount' => 'nullable|numeric',
//            'income_amount' => 'nullable|numeric',
//            'status' => 'nullable|string',
//            "price" => "nullable|numeric|min:0",
//            "order_id" => "nullable|integer|exists:orders,id",
//            'refunded_amount' => 'nullable|numeric',
//            'payment_method' => 'nullable|string',
//            "test" => 'nullable|boolean',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['errors' => $validator->errors()], 422);
//        }
//
//        $validated = $validator->validated();
//        $state = $payment->update($validated);
//        if (!$state) {
//            return response()->json(['error' => 'not updated'], 400);
//        }
//
//        return response()->json(['message' => 'updated successfully']);
//    }
}
