<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout (Request $request) {
        //logout user
        $request->session()->flush();
        
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}