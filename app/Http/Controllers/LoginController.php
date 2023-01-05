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
}
