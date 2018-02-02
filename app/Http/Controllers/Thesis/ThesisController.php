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
}
