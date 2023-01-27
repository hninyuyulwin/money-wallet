<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::where('id',Auth::user()->id)->get();
        return view('front.user_profile',compact('users'));
    }

    public function edit(User $user)
    {
        $currencies = Currency::all();
        return view('front.user_profile_edit',compact('user','currencies'));
    }

    public function update(Request $request,User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->route('profile')->with('message','User Profile Updated!');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('home');
    }
}
