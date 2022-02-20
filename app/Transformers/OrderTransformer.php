<?php
namespace App\Transformers;

use App\Order;
use League\Fractal;

class OrderTransformer extends Fractal\TransformerAbstract
{
    public function transform(Order $order)
    {
        return [
            "id" => $order->id,
            "email" => $order->email,
            "image" => $order->image,
            "name" => $order->name,
            "amount" => $order->amount,
            "product_id" => $order->product_id,
            "user_id" => $order->user_id,
            "order_qty" => $order->order_qty,
        ];
    }
}
