<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $returnURL;

    public function __construct()
    {
        $this->returnURL = config('app.url');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $orders =  OrderResource::collection( $user->orders);
        return view('pages.orders', compact('orders'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $password = $request->get('password', '');
        if ($password !== $user->password) return ['error' => 'Неверный пароль'];

        $items = $user->carts->toArray();
        $finalPrice = collect($items)->sum('price');

        if ($finalPrice < 1) return ['error' => 'Добавьте товары в корзину'];

        $order = $user->orders()->create([
            'items' => $items,
            'finalPrice' => $finalPrice
        ]);

        foreach ($user->carts as $orderItem) {
            $orderItem->item->quantity -= $orderItem->count;
            $orderItem->item->save();
        }

        $payment = new PaymentController();
        $pay = $payment->store([
            "url" => $validatedData["url"] ?? $this->returnURL,
            "price" => $finalPrice,
            "order_id" => $order->id,
            "user" => $user,
        ]);

        if (!empty($pay["errors"])) {
            return response()->json($pay, 422);
        }


        $user->carts()->delete();

        return $order;
    }

    public function delete(Order $order)
    {
        if ($order->status !== 'Новый') {
            return redirect()->back();
        }

        $order->delete();

        return redirect()->route('orders');
    }

    public function cancelOrder(Request $request, Order $order)
    {
        $description = $request->get('description');
        $order->status = 'Отменён';
        $order->description = $description;
        $order->save();

        return redirect()->back();
    }

    public function confirmOrder(Order $order)
    {
        $order->status = 'Подтверждён';
        $order->save();

        return redirect()->back();
    }
}
