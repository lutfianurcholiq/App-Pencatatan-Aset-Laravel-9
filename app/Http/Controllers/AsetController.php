<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Sekolah;
use App\Models\Penyusutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aset.index', [
            'title' => 'Aset Sekolah',
            'asets' => Aset::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aset.create', [
            'title' => 'Create Data Aset',
            'sekolahs' => Sekolah::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_aset' => 'required|max:255',
            'jenis_aset' => 'required',
            'sekolah_id' => 'required',
            'tahun' => 'required|integer',
            'foto_aset' => 'required|image|mimes:png,jpg,jpge|max:5000',
            'harga_beli' => 'required',
            'status' => 'max:255',
        ]);

        if ($request->confirm_susut == 'susut') {

            $bank = Aset::all('id')->count();

            $estimasi_nilai_sisa = $validated['harga_beli'] * 0.10;
            // return $nilai_residu;
            $masa_manfaat = 20;
            $residu = $validated['harga_beli'] / $masa_manfaat;
            $nilai_penyusutan = ($validated['harga_beli'] - $residu) / $masa_manfaat;

            $akumulasi = $nilai_penyusutan+$nilai_penyusutan;
            $nilai_sisa = $validated['harga_beli'] - $nilai_penyusutan;

            // for ($i=$validated['tahun']; $i < $masa_manfaat ; $i++) { 
                

            // }

            Penyusutan::create([
                'aset_id' => $bank+1,
                'sekolah_id' => $validated['sekolah_id'],
                'masa_manfaat' => $masa_manfaat,
                'nilai_penyusutan' => $nilai_penyusutan,
                'estimasi_nilai_sisa' => $estimasi_nilai_sisa,
                'akumulasi' => $akumulasi,
                'nilai_sisa' => $nilai_sisa,
                'status' => 'Telah disusutkan'


            ]);

            $validated['status'] = "telah disusutkan";

            $validated['foto_aset'] = $request->file('foto_aset')->store('foto-aset');
    
            Aset::create($validated);
            
            return redirect('/aset')->with('success','Data Berhasil Di Tambahkan dan aset telah dilakukan penyusutan');
        }else{

            $validated['status'] = "belum disusutkan";

            $validated['foto_aset'] = $request->file('foto_aset')->store('foto-aset');
    
            Aset::create($validated);

            return redirect('/aset')->with('success','Data Berhasil Di Tambahkan, silakan melakukan penyusutan aset di menu penyusutan');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function show(Aset $aset)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function edit(Aset $aset)
    {
        return view('admin.aset.edit', [
            'asets' => $aset,
            'title' => 'Edit Data aset',
            'sekolahs' => Sekolah::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aset $aset)
    {
        $validated = $request->validate([
            'nama_aset' => 'required|max:255',
            'jenis_aset' => 'required',
            'sekolah_id' => 'required',
            'tahun' => 'required|integer',
            'foto_aset' => 'image|mimes:png,jpg,jpge|max:5000',
            'harga_beli' => 'required'
        ]);

        if($request->file('foto_aset')){
            if($request->foto_aset_lama){
                Storage::delete($request->foto_aset);    
            }
            $validated['foto_aset'] = $request->file('foto')->store('foto-sekolah');
        }

        Aset::where('id', $aset->id)->update($validated);

        return redirect('/aset')->with('success','Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aset $aset)
    {
        if($aset->foto_aset){
            Storage::delete($aset->foto_aset);    
        }
        $asets = Aset::find($aset->id); 

        $asets->delete();

        return redirect('/aset')->with('success', 'Data Berhasil Terhapus');
    }
}
