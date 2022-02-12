<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Support\Facades\DB;

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
            'amount' => 'required',
        ]);

        $user_id = auth()->user()->id;

        $previousBalance = DB::table('balances')
            ->where('user_id', $user_id)
            ->latest('created_at')
            ->first();

        Balance::create([
            'amount' => ($previousBalance) ? $data['amount'] + $previousBalance->amount : $data['amount'],
            'mode' => 'Toping-up',
            'currency_id' => 1,
            'user_id' => $user_id,
        ]);

        return redirect('/top');
    }
}
