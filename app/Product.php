<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'discounted_price', 'description', 'quantity', 'image', 'currency_id',
    ];

    protected $table = 'products';
}
