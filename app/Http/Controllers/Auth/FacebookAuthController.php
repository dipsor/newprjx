<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Users\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreated;

class FacebookAuthController extends Controller
{
    /**
     * FacebookAuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

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

        $authUser = User::where('facebook_id', $user->id)->first();

        if($authUser) {
            return $authUser;
        }

        return $this->registerUser($user);
    }

    private function registerUser($user)
    {
        $pass = $this->generateRandomString();

        //Mail::to($user->email)->send(new AccountCreated($user, $pass));

        $user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt($pass),
            'facebook_id' => $user->id,
            'facebook_avatar' => 'ddd',
        ]);

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
