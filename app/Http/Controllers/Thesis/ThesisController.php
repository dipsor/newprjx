<?php

namespace App\Http\Controllers\Thesis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThesisController extends Controller
{
    public function index(Request $request)
    {
        return view('thesis.index');
    }

    public function returnIt(Request $request)
    {
        logger($request->get('id'));
        return view('thesis.return')->with('request', $request);
    }


    public function notify(Request $request)
    {
        return view('thesis.notify')->with('request', $request);
    }
}
