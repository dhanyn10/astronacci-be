<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLimit;

use Validator;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required',
            'password'  => 'required',
            're-password'   => 'required'
        ]);

        if($valid->fails())
        {
            flash('error', 'danger');
            return redirect()->route('auth-register');
        }
        
        $name       = $request->input('name');
        $email      = $request->input('email');
        $password   = $request->input('password');
        $rePassword = $request->input('re-password');

        $getUser = User::where('name', $name)->get();
        if(count($getUser) > 0)
        {
            flash('user exist', 'danger');
            return redirect()->route('auth-register');
        }

        if($password != $rePassword)
        {
            flash('password incorrect', 'danger');
            return redirect()->route('auth-register');
        }

        $create = User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => $password,
            'oauth'     => 0
        ]);

        $userLimit = UserLimit::create([
            'email' => $email
        ]);
        
        if(!$create)
        {
            flash('create new user error', 'danger');
            return redirect()->route('auth-register');
        }

        if(!$userLimit)
        {
            flash('create new limit error', 'danger');
            return redirect()->route('auth-register');
        }
        
        flash('success creating data', 'success');
        return redirect()->route('auth-login');
    }
}
