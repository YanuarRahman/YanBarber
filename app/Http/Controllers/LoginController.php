<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if ($user =  Auth::user()) {
            if ($user->level == '1') {
                return redirect()->intended('Administrator');
            } elseif ($user->level == '2') {
                return redirect()->intended('Beranda');
            }
        }

        return view('login.login_view');
    }


    public function proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);

        $kredensial = $request->only('username', 'password');

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            if ($user =  Auth::user()) {
                if ($user->level == '1') {
                    return redirect()->intended('Administrator');
                } elseif ($user->level == '2') {
                    return redirect()->intended('Beranda');
                }
            }

            return redirect()->intended('/');
        }


        return back()->withErrors([
            'username' => 'Maaf Username atau Password Salah',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/login');
    }
}
