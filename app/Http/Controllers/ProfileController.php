<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function index()
    {
        return view('admin.profile.index', [
            'users' => User::all()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'password' => 'min:5|max:7'
        ]);
        
        $validated['password'] = bcrypt($validated['password']);

        User::where('id', auth()->user()->id)->update($validated);

        return redirect('/profile')->with('success', 'Profile telah berhasil di update');
    }
}
