<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => 'required|email',
            'password' => 'required'
        ]);

        $credentials= $request->only('email', 'password');
        $remember = $request->filled('remember');

        if(Auth::attempt($credentials, $remember))
        {
            return redirect()->intended('/');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function destroy()
    {
        Auth::logout();
        request()->session()->invalidate(); //Protection against session fixation
        request()->session()->regenerate(); //regenerate the csrf token (garantees the old session cannot be used by a third party)
        return redirect('/');
    }
}
