<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Penyusutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyusutanController extends Controller
{
    
    public function index(Request $request)
    {
        
        $penyusutan = Penyusutan::all();

        if($request->sekolah_id != null and $request->cari_aset != null)
        {

            // $asetss = DB::table('sekolahs')
            //             ->select('asets.harga_beli')
            //             ->join('asets','sekolahs.id','=','asets.sekolah_id')
            //             ->where('asets.id', $request->cari_aset )
            //             ->get('harga_beli');
            // $masa  = 20 ;
            // $residu = (int)$asetss / $masa;
            // $nilai_penyusutan = ($asetss - $residu)/ $masa;

            // return $nilai_penyusutan;

            $asets = DB::table('sekolahs')
                        ->select('asets.id as aset','asets.nama_aset','sekolahs.id as sekolah','sekolahs.nama_sekolah', 'asets.tahun','asets.harga_beli')
                        ->join('asets','sekolahs.id','=','asets.sekolah_id')
                        ->where('asets.id', $request->cari_aset )
                        ->get('aset','sekolah','nama_sekolah','nama_aset', 'tahun', 'harga_beli');
            
            // return $asets;

            return view('admin.penyusutan.index', [
                'title' => "Detail Penyusutan",
                'sekolahs' => Sekolah::all(),
                'aset' => $asets
            ]);
        }
        

        return view('admin.penyusutan.index', [
            'title' => "Detail Penyusutan",
            'sekolahs' => Sekolah::all(),
            'susuts' => $penyusutan,
        ]);
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'sekolah_id' => 'integer',
            'aset_id' => 'integer',
            'masa_manfaat' => 'max:255',
            'harga_beli' => 'integer',
            'estimasi_nilai_sisa' => 'integer',
            'nilai_penyusutan' => 'integer',

        ]);

        $akumulasi = $request->nilai_penyusutan;

        $nilai_sisa = $request->harga_beli - $request->nilai_penyusutan;

        Penyusutan::create([
            'sekolah_id' => $request->sekolah_id,
            'aset_id' => $request->aset_id,
            'masa_manfaat' => $request->masa_manfaat,
            'nilai_penyusutan' => $request->nilai_penyusutan,
            'estimasi_nilai_sisa' => $request->estimasi_nilai_sisa,
            'akumulasi' => $akumulasi,
            'nilai_sisa' => $nilai_sisa,
            'status' => 'telah disusutkan'
        ]);

        return redirect('/penyusutan')->with('success', 'Penyusutan aset berhasil dilakukan');



    }

    public function show(Penyusutan $penyusutan)
    {
        return view('admin.penyusutan.show', [
            'title' => "Detail Penyusutan"
        ]);
    }
}
