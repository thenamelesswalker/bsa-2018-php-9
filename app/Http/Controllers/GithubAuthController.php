<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    protected $redirectPath = '/currencies';

    public function redirectToProvider(Request $request) {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        
        $socialUser = Socialite::driver('github')->user();
        $email = $socialUser->email;
        $user = User::where(['email' => $email])->first();

        if (is_null($user)) {
            $user = User::create([
                'name' => $socialUser->user['login'],
                'email' => $socialUser->email,
                'password' => str_random(6),
            ]);
        }
        Auth::login($user);
        return redirect($this->redirectPath);
    }
}
