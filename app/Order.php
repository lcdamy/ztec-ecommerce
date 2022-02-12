<?php

namespace App;

use App\Balance;
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
            $user_id = auth()->user()->id;
            $previousBalance = DB::table('balances')->where('user_id', $user_id)->latest('created_at')->first();
            Balance::create([
                'amount' => $previousBalance->amount - $order->amount,
                'mode' => 'Purchase product',
                'user_id' => $user_id,
            ]);

            $product = DB::table('products')->where('id', $order->product_id)->first();
            if ($product) {
                DB::table('products')->update([
                    'quantity' => $product->quantity - 1,
                ]);
            }

        });
    }
}
