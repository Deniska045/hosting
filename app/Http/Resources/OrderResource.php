<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $item = [
            'id' => $this->id,
            'finalPrice' => $this->finalPrice . ' ₽',
            'status' => $this->status,
            'items' => $this->items,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        $status = $item["status"];
        $payment = $this->payment;
        if ($payment->status=== "pending" && $status === "Подтверждён") {
            $url = "https://yoomoney.ru/checkout/payments/v2/contract?orderId=" . $payment["transaction_id"];
            $item["pay"] = $url;
        }

        return $item;
    }
}

