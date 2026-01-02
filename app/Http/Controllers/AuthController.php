<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function schoolLoginIndex()
    {
        return view('pages.login');
    }

    function schoolLoginPost(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->route('school.dashboard');
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
    }

    
}
