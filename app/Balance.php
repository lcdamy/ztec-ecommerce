<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'amount', 'mode', 'user_id',
    ];

    protected $table = 'balances';

}
