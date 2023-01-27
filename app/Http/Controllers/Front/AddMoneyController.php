<?php

namespace App\Http\Controllers\Front;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddMoneyController extends Controller
{
    public function index()
    {
        return view('front.add_moeny');
    }

    public function approval()
    {
        return view('front.approval');
    }
    public function amountCreate(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:1|max:8',
        ]);
        $wallet = Wallet::where('user_id',Auth::user()->id)->first();
        $wallet->amount = $wallet->amount + $request->amount;
        $wallet->update([
            'amount' => $wallet->amount,
        ]);
        return redirect()->route('home')->with('message','Money Added to your wallet!');
    }
}
