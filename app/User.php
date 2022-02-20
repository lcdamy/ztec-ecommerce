<?php

namespace App;

use App\Order;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);

    }

    public function balances()
    {
        return $this->hasMany(Balance::class)->latest('created_at');

    }

    public function ordersNumberByClient()
    {
        return (auth()->user()->orders) ? auth()->user()->orders->count() : 0;

    }

    public function ordersNumber()
    {
        return Order::all()->count();

    }

}
