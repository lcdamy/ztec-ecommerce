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
        $tops = DB::table('balances')->where('user_id', $user_id)->get();
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
            'user_id' => $user_id,
        ]);

        return redirect('/top');
    }
}
