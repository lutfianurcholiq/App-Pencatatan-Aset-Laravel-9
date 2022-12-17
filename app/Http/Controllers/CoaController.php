<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coa.index', [
            'title' => "Chart of Account",
            'coas' => Coa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'admin'){
            return redirect('/aset')->with('error','Tidak bisa akses halaman tersebut');
        }
        return view('admin.coa.create', [
            'title' => "Tambah Chart of Account"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Coa $coa)
    {
        $validated = $request->validate([
            'no_coa' => 'required|integer|unique:coas',
            'nama_coa' => 'required|max:255',
            'jenis_coa' => 'required',
            'saldo_awal' => 'integer'
        ]);
        
        Coa::create($validated);

        return redirect('/coa')->with('success', 'Data Berhasil di Tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coa  $coa
     * @return \Illuminate\Http\Response
     */
    public function show(Coa $coa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coa  $coa
     * @return \Illuminate\Http\Response
     */
    public function edit(Coa $coa)
    {
        if(auth()->user()->role == 'admin'){
            return redirect('/aset')->with('error','Tidak bisa akses halaman tersebut');
        }
        return view('admin.coa.edit', [
            'title' => "Ubah Chart of Account",
            'coas' => $coa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coa  $coa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coa $coa)
    {
        $validated = $request->validate([
            'no_coa' => 'required|integer',
            'nama_coa' => 'required|max:255',
            'jenis_coa' => 'required',
            'saldo_awal' => 'required'
        ]);
        
        Coa::where('id', $coa->id)->update($validated);

        return redirect('/coa')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coa  $coa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coa $coa)
    {
        $coas = Coa::find($coa->id);

        $coas->delete();

        return redirect('/coa')->with('success', 'Data berhasil di hapus');
    }
}
