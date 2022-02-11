<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

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
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $balance = 0;
            if ($user_id) {
                $top = DB::table('balances')->where('user_id', $user_id)->latest('created_at')->first();
                if ($top) {
                    $balance = $top->amount;
                } else {
                    $balance = 0;
                }
            } else {
                $balance = 0;
            }
        }

        $products = Product::join('currencies', 'products.currency_id', '=', 'currencies.id')->latest()->get(['currencies.code', 'products.*']);
        return view('home', compact('products', 'balance'));
    }
}
