<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        $this->generateCaptcha();
        return view('login');
    }

    public function generateCaptcha() {
        $num1 = random_int(1,9);
        $num2 = random_int(1,9);
        session([
            'captcha_num1' => $num1,
            'captcha_num2' => $num2,
            'captcha_result' => $num1 + $num2
        ]);
        return "$num1 + $num2 = ?";
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if($request->captcha != session('captcha_result')) {
            return back()->with('loginError', 'Captcha salah!');
        }

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Gagal login!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
