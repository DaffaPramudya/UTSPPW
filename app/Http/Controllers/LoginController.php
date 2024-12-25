<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google\Client as GoogleClient;
use Google\Service\Oauth2;

class LoginController extends Controller
{
    public function index()
    {
        $this->generateCaptcha();
        return view('login');
    }

    public function generateCaptcha()
    {
        $num1 = random_int(1, 9);
        $num2 = random_int(1, 9);
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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->captcha != session('captcha_result')) {
            return back()->with('error', 'Captcha salah!');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Gagal login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function google(Request $request)
    {
        $client = new GoogleClient();
        $client->setClientId('');
        $client->setRedirectUri(route('googleauth'));
        $token = $client->fetchAccessTokenWithAuthCode($request->get('code'));
        $client->setAccessToken($token['access_token']);
        $oauth = new Oauth2($client);
        $userinfo = $oauth->userinfo->get();
        session([
            'google_user' => [
                'email' => $userinfo->email,
                'name' => $userinfo->givenName,
            ]
        ]);
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
}
