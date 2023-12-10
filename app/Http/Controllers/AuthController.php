<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function authenticateUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['bail', 'required', 'string'],
            'password' => ['bail', 'required', 'string']
        ]);

        $rememberMe = $request->get('remember-me');

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['invalid_credentials' => 'Invalid credentials.']);
    }

    public function deauthenticateUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
