<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'title' => 'User Data',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            // 'is_active' => 'max:255',
            'role' => 'max:255'
        ]);
        // dd($request);
        if($request->is_active == NULL){
            User::where('id', $id)->update([
                'role' => $request->role,
                'is_active' => 'aktif'
            ]);
            return redirect('/activeUser')->with('success','Berhasil update role');
        }elseif($request->is_active == 'aktif'){
            User::where('id', $id)->update([
                'is_active' => 'nonaktif'
            ]);
            return redirect('/activeUser')->with('success','Berhasil menonaktifkan user');
        }elseif($request->is_active == 'nonaktif'){
            User::where('id', $id)->update([
                'is_active' => 'aktif'
            ]);
            return redirect('/activeUser')->with('success','Berhasil mengaktifkan user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $user->id;
        $users = User::find($id); 

        $users->delete();

        return redirect('/activeUser')->with('success', 'Data Berhasil Terhapus');
    }
}
