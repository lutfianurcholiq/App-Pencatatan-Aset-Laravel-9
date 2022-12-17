<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'is_active' => 'max:255',
            'role' => 'max:255',
            'password' => 'required|min:5|max:7',
            'password_confirm' => 'required|min:5|max:7|required_with:password|same:password'
        ]);

        $request->password = bcrypt($request->password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'role' => $request->role,
            'password' => $request->password
        ]);

        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }
}
