<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\PHPIMAP\ClientManager;

class LoginContoller extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // dd($request);

        $request->session()->put('auth', $request->all());
        return redirect()->route('mail');
    }
}
