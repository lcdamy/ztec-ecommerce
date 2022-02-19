<?php
namespace App\Transformers;

use App\Order;
use League\Fractal;

class OrderTransformer extends Fractal\TransformerAbstract
{
    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'amount' => $order->name,
        ];
    }
}
