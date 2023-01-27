<?php

namespace App\Http\Controllers\Back;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminWalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::paginate(10);
        return view('back.admin_wallet.index',compact('wallets'));
    }
}
