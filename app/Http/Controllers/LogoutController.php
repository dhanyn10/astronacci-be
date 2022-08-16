<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function show()
    {
        session()->flush();
        return redirect()->route('auth-login');
    }
}
