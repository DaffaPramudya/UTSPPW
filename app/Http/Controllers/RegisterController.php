<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi berhasil silahkan login!');
    }

}
