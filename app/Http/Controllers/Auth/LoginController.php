<?php
// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Xác thực người dùng và lưu cookie nếu chọn "ghi nhớ đăng nhập"
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Lưu thêm cookie tùy chỉnh nếu cần
            $user = Auth::user();
            $cookieTime = $request->filled('remember') ? 43200 : 60; // 30 ngày hoặc 60 phút

            cookie()->queue('user_email', $user->email, $cookieTime);

            // Chuyển hướng đến trang dashboard sau khi đăng nhập
            return redirect()->intended('dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Xóa cookies tùy chỉnh
        cookie()->queue(cookie()->forget('user_email'));

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
