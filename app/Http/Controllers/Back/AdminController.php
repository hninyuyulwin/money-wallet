<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home()
    {
        $users = User::count();
        $currencies = Currency::count();
        return view('back.home',compact('users','currencies'));
    }
}
