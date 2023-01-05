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
                return redirect()->intended('Beranda');
            } elseif ($user->level == '2') {
                return redirect()->intended('User');
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


        return back()->withErrors([
            'username' => 'Maaf Username atau Password Failed',
        ])->onlyInput('username');
    }
}
