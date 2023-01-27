<?php

namespace App\Http\Controllers\Back;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::paginate(5);
        return view('back.admin_currency.index',compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.admin_currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required'
        ]);
        $currency = Currency::create([
            'name' => $request->name,
            'amount' => 1,
        ]);
        return redirect()->route('admin.currency')->with('message','Currency Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('back.admin_currency.edit',compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Currency $currency)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required'
        ]);
        $currency->update([
            'name' => $request->name,
            'amount' => $request->amount
        ]);
        return redirect()->route('admin.currency')->with('message','Currency Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->back()->with('message','Currency Deleted!');
    }
}
