<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showFormLogin()
    {
        return view('auth.login');
    }

    // Xử lý yêu cầu đăng nhập
    public function login(Request $request)
    {
        // Xác thực đầu vào
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        // Xử lý đăng nhập
        if (Auth::attempt($credentials, $request->remember)) {
            // Nếu đăng nhập thành công, chuyển hướng đến trang chủ
            return redirect()->intended('/admin'); // Bạn có thể thay đổi URL này theo yêu cầu
        }

        // Nếu đăng nhập thất bại, quay lại form và báo lỗi
        return back()->withErrors([
            'loginError' => 'Email hoặc mật khẩu không đúng',
        ])->onlyInput('email'); // Giữ lại email để người dùng không cần nhập lại
    }

    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        $user = User::query()->create($data);
        Auth::login($user);
        return redirect()->intended('login');
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login'); // Chuyển hướng về trang đăng nhập
    }

}
