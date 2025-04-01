<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('index'); // Adjust view name if needed
    }

    // Handle Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/home'); // Redirect after login
        } else {
            return back()->withErrors(['login_error' => 'Invalid credentials!']);
        }
    }
}
