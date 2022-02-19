<?php

namespace App\Http\Controllers;

use App\Balance;

class TopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $tops = Balance::join('currencies', 'balances.currency_id', '=', 'currencies.id')
            ->select(['currencies.code', 'balances.*'])
            ->where('user_id', $user_id)
            ->latest('balances.created_at')
            ->get();

        return view('client.top', compact('tops'));
    }

    public function store()
    {
        $data = request()->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $previousBalance = (auth()->user()->balances->first()) ? auth()->user()->balances->first()->amount : 0;

        auth()->user()->balances()->create([
            'amount' => ($previousBalance) ? $data['amount'] + $previousBalance : $data['amount'],
            'mode' => 'Toping-up',
            'currency_id' => 1,
        ]);

        return redirect('/top');
    }
}
