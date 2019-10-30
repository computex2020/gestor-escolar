<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {    
        return view('index');
    }

    public function logout(Request $request) 
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('logout');
    }
}