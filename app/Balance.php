<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'amount', 'mode', 'user_id', 'currency_id',
    ];

    protected $table = 'balances';

    public function user()
    {
        return $this->belongsTo(Balance::class);
    }

}
