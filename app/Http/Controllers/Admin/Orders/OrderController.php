<?php

namespace App\Http\Controllers\Admin\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        return view('admin.orders.index');
    }

    public function show() {
        return view('admin.orders.show');
    }
}
