<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('user_id',Auth::user()->id)->get();
        return view('front.user_contact',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.user_contact_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:contacts,phone|digits_between:9,11'
        ],
        [
            'phone.unique' => 'Phone number is alerady exists',
        ]);
        $contact->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('contact')->with('message', 'Contact Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('front.user_contact_edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);
        $contact->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        return redirect()->route('contact')->with('message', 'Contact Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact')->with('message','Contact Deleted');
    }
}
