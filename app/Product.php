<?php

namespace App;

use App\Mail\AdminProductAddNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'discounted_price', 'description', 'quantity', 'image', 'currency_id',
    ];

    protected $table = 'products';

    protected static function boot()
    {
        parent::boot();
        static::created(function ($product) {
            Mail::to(auth()->user()->email)->send(new AdminProductAddNotification());
        });
    }
}
