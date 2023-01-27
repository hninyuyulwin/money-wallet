<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Contact;
use App\Models\History;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id',Auth::user()->id)->get();
        return view('front.transfer_money',compact('contacts'));
    }

    public function checkNum(Request $request)
    {
        $request->validate([
            'phone' => 'required',
        ]);
        $currencies = Currency::all();
        $contact = Contact::find($request->phone);

        return view('front.transfer_money_confirm',compact('contact','currencies'));
    }

    public function confirm(Request $request,$id)
    {
        $contact = Contact::findOrFail($id);
        $request->validate([
            'amount' => 'required'
        ]);
        $transfer_amount = $request->amount;
        $wallet = Wallet::where('user_id',Auth::user()->id)->first();
        $wallet_amount = $wallet->amount;
        $wallet_id = $wallet->id;

        $currencies = Currency::find($request->currency);

        if ($wallet_amount > $transfer_amount) {
            $history = new History();
            if (empty($request->currency)) {
                $history->transition_id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5).date('YmdHis').substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
                $history->user_id = Auth::user()->id;
                $history->contact_id = $contact->id;
                $history->amount = $transfer_amount;
                if($request->description){
                    $history->description = $request->description;
                }
                $history->save();

                $wallet_amount = $wallet_amount - $transfer_amount;
                $wallet = Wallet::findOrFail($wallet_id);
                $wallet->update([
                    'amount' => $wallet_amount,
                ]);
            } else {
                if ($currencies->name == "US") {
                    $show_amount = $transfer_amount/2500;
                    $history->transition_id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5).date('YmdHis').substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
                    $history->user_id = Auth::user()->id;
                    $history->contact_id = $contact->id;
                    $history->transfer_type = $currencies->name;
                    $history->amount = $show_amount;
                    if($request->description){
                        $history->description = $request->description;
                    }
                    $history->save();

                    $wallet_amount = $wallet_amount - $transfer_amount;
                    $wallet = Wallet::findOrFail($wallet_id);
                    $wallet->update([
                        'amount' => $wallet_amount,
                    ]);
                }
            }
            return redirect()->route('home')->with('message','Money Transfer Success');
        }
        else{
            return redirect()->back()->with('error','Money in your wallet is insufficient!! Try Again!');
        }
    }
}
