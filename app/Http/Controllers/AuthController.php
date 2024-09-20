<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request) {
        $user = $request->validate([
            'name' => ['required', 'string','max:255'],
            'password' => ['required', 'string']
        ]);

        if(Auth::attempt($user)){
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors([
            'email' => 'Thông tin người dùng không đúng'
        ]);
    }
    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request) {
       $data = $request->validate([
        'email' => 'required|string|email|max:255',
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:8'
       ]);

       $user = User::query()->create($data);
       Auth::login($user);
       return redirect()->intended('login');
    }
    public function password_reset()
    {
        return view('auth.password_reset');
    }
    public function home()
    {
       dd('home');
    }

}
