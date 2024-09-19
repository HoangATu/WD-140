<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function password_reset()
    {
        return view('auth.password_reset');
    }
}
