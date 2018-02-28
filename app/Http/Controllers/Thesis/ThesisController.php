<?php

namespace App\Http\Controllers\Thesis;

use GoPay\Payments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use HazeStudio\LaravelGoPaySDK\Facade as GoPay;

class ThesisController extends Controller
{
    public function index(Request $request)
    {
        return view('thesis.index');
    }

    public function returnIt(Request $request)
    {
        $id = $request->get('id');
        $status = Gopay::getStatus($id);

        logger(['status' => $status->json['state']]);
        return view('thesis.return')->with('request', $request);
    }


    public function notify(Request $request)
    {
        logger([$request]);
        return view('thesis.notify')->with('request', $request);
    }


}
