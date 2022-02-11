<?php

namespace App;

use App\Balance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $guarded = [];

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
        });
    }
}
