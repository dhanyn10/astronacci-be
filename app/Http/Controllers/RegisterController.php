<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        // dd($password);
        $create = User::create([
            'name'  => $name,
            'email' => $email,
            'password'  => $password
        ]);
        
        if(!$create)
        {
            flash('create new data error', 'danger');
            return redirect()->route('auth-register');
        }
        
        flash('success creating data', 'success');
        return redirect()->route('auth-login');
    }
}
