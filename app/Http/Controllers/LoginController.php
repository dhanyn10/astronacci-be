<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use Validator;

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

    public function login(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'email' => 'required',
            'password'  => 'required'
        ]);

        if($valid->fails())
        {
            flash('error', 'danger');
            return redirect()->route('auth-login');
        }
        
        $email      = $request->input('email');
        $password   = $request->input('password');

        $getUser = User::where('email', $email)->get();
        if(count($getUser) == 0)
        {
            flash('user not exist', 'danger');
            return redirect()->route('auth-login');
        }

        $getPassword = $getUser->pluck('password')->first();
        if($password != $getPassword)
        {
            flash('password incorrect', 'danger');
            return redirect()->route('auth-login');
        }

        $getName = $getUser->pluck('name')->first();
        session([
            'name' => $getName
        ]);

        return redirect()->route('home');

    }
}
