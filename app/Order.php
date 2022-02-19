<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = [
        'amount', 'order_qty', 'product_id', 'user_id',
    ];

    protected $table = 'orders';

    protected static function boot()
    {

        parent::boot();
        static::created(function ($order) {
            $previousBalance = (auth()->user()->balances) ? auth()->user()->balances->first() : 0;
            auth()->user()->balances()->create([
                'amount' => $previousBalance->amount - $order->amount,
                'mode' => 'Purchase product',
                'currency_id' => 1,
            ]);

            $product = DB::table('products')->where('id', $order->product_id)->first();

            if ($product) {
                DB::table('products')->where('id', $order->product_id)->update([
                    'quantity' => $product->quantity - 1,
                ]);
            }

        });
    }

    public function user()
    {
        return $this->belongsTo(Order::class);
    }
}
