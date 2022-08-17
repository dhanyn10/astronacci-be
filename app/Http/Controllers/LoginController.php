<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\UserLimit;

use Validator;

class LoginController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $user   = Socialite::driver('google')->user();
        $email  = $user->email;
        $name   = $user->name;
        $getdata = User::where('email', $email)->get();
        $role   = $getdata->pluck('role')->first();
        //automatically create new user
        if(count($getdata) == 0)
        {
            $create = User::create([
                'name'  => $name,
                'email' => $email,
                'oauth' => 1
            ]);
            
            $userLimit = UserLimit::create([
                'email' => $email
            ]);

            if(!$create)
            {
                flash('failed to create new user', 'danger');
                return redirect()->route('auth-login');
            }

            if(!$userLimit)
            {
                flash('create new limit error', 'danger');
                return redirect()->route('auth-login');
            }
        }
        session([
            'name'  => $name,
            'email' => $email,
            'role'  => $role
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
        $email  = $user->email;
        $name   = $user->name;
        $getdata = User::where('email', $email)->get();
        $role   = $getdata->pluck('role')->first();
        //automatically create new user
        if(count($getdata) == 0)
        {
            $create = User::create([
                'name'  => $name,
                'email' => $email,
                'oauth' => 1
            ]);
            
            $userLimit = UserLimit::create([
                'email' => $email
            ]);

            if(!$create)
            {
                flash('failed to create new user', 'danger');
                return redirect()->route('auth-login');
            }

            if(!$userLimit)
            {
                flash('create new limit error', 'danger');
                return redirect()->route('auth-login');
            }
        }
        
        session([
            'name'  => $name,
            'email' => $email,
            'role'  => $role
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
        $role = $getUser->pluck('role')->first();
        session([
            'name'  => $getName,
            'email' => $email,
            'role'  => $role
        ]);

        if($role == 0)
            return redirect()->route('home');
        else
            return redirect()->route('admin-home');

    }
}
