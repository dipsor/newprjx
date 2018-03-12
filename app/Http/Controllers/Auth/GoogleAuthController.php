<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Users\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreated;

class GoogleAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect(route('home'));
    }

    private function findOrCreateUser($user)
    {
        $authUser = User::where('email', $user->email)->first();
        if($authUser) {
            return $authUser;
        }

        $authUser = User::where('google_id', $user->id)->first();
        if($authUser) {
            return $authUser;
        }

        return $this->registerUser($user);
    }

    private function registerUser($user)
    {
        $pass = $this->generateRandomString();

        $user = User::create([
            'name' => $user->name,
            'email' => $user->email,
//            'password' => rand(1,10),
            'password' => bcrypt($pass),
            'google_id' => $user->id,
            'google_avatar' => 'ddd',
        ]);

        Mail::to($user->email)->send(new AccountCreated($user, $pass));

        $user->assignRole(2);

        return $user;
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
