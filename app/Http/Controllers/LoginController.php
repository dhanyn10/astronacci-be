<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $name = $user->name;
        session([
            'name'  => $name
        ]);
        return redirect()->route('home');
    }
    
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $name = $user->name;
        session([
            'name'  => $name
        ]);
        return redirect()->route('home');
    }
    public function show()
    {
        return view('auth.login');
    }
}
