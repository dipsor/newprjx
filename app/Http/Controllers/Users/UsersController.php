<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $id = null;

        if ($request->get('id') !== null) {
            $id = $request->get('id');
        }

        return view('users.index')->with('id', $id);
    }

    public function show($id)
    {
        return view('users.edit', ['id' => $id]);
    }
}
