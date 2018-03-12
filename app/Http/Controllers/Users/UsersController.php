<?php

namespace App\Http\Controllers\Users;

use App\Mail\AccountCreated;
use App\Users\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $id = null;

        if ($request->get('id') !== null) {
            $id = $request->get('id');
        }

        $user = User::all()->first();

//        Mail::to($user->email)->send(new AccountCreated($user, $this->generateRandomString()));

        return view('users.index')->with('id', $id);
    }

    public function show($id)
    {
        return view('users.edit', ['id' => $id]);
    }

    public function showorder($id)
    {
        return view('users.order', ['id' => $id]);
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
