<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        return view('/profile');
    }

    public function store(Request $request) {
        $user = auth()->user();
        if($user->profilepic) {
            Storage::delete($user->profilepic);
        }
        $user->name = $request->nama;
        $user->nomor = $request->nomor;
        $user->alamat = $request->alamat;
        $user->gender = $request->gender;
        $user->profilepic = $request->file('fileupload')->store('profile-images');
        $user->save();
        return back()->with('successUpdate', 'Profile berhasil diupdate');
    }

    public function deleteProfilepic() {
        $user = auth()->user();
        if($user->profilepic) {
            Storage::delete($user->profilepic);
        }
        $user->profilepic = null;
        $user->save();
        return back()->with('successUpdate', 'Profile berhasil diupdate');
    }
}
