<?php

namespace App;

use App\Mail\AdminProductAddNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name', 'price', 'discounted_price', 'description', 'quantity', 'image', 'currency_id',
    ];

    protected $table = 'products';

    protected static function boot()
    {
        parent::boot();
        static::created(function ($product) {
            if (Auth::check()) {
                Mail::to(auth()->user()->email)->send(new AdminProductAddNotification());
            }
        });
    }
}
