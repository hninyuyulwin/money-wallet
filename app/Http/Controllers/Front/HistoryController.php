<?php

namespace App\Http\Controllers\Front;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::OrderBy('created_at','desc')->where('user_id',Auth::user()->id)->get();
        return view('front.history',compact('histories'));
    }
    public function details($id)
    {
        $history = History::findOrFail($id);
        return view('front.history_details',compact('history'));
    }
    public function search(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $start = $request->from;
            $end = $request->to;
            $histories = History::where('user_id',Auth::user()->id)->whereBetween('created_at',[$start,$end])->get();
        }
        return view('front.history',compact('histories'));
    }
}
