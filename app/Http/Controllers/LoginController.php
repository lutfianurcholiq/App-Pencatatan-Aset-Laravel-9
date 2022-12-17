<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:7'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('/dashboard')->with('success', 'Selamat Datang!!!');
        }

        return back()->withErrors([
            'email' => 'cek kembali email',
            'password' => 'password tidak sesuai dengan email'
        ])->onlyInput(['email','password']);

        // return back()->with('failed', 'User anda saat ini sedang tidak aktif, segera hubungi')


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('warning', 'Anda Telah Berhasil Logout');
    }
}
