<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $balance = 0;
        $currency = '';
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            if ($user_id) {
                $top = Balance::join('currencies', 'balances.currency_id', '=', 'currencies.id')
                    ->select(['currencies.code', 'balances.*'])
                    ->where('user_id', $user_id)
                    ->latest('balances.created_at')
                    ->first();
                if ($top) {
                    $balance = $top->amount;
                    $currency = $top->code;
                } else {
                    $balance = 0;
                }
            } else {
                $balance = 0;
            }
        }

        $products = Product::join('currencies', 'products.currency_id', '=', 'currencies.id')
            ->latest()
            ->select(['currencies.code', 'products.*'])
            ->paginate(6);

        return view('home', compact('products', 'balance', 'currency'));
    }
}
