<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    
    public function kartu_aset()
    {
        $penyusutan = DB::table('penyusutans')
                        ->select('asets.nama_aset','sekolahs.nama_sekolah','penyusutans.status','penyusutans.id as id_susut')
                        ->join('sekolahs','sekolahs.id','=','penyusutans.sekolah_id')
                        ->join('aset_penyusutan','aset_penyusutan.penyusutan_id','=','penyusutans.id')
                        ->join('asets','asets.id','=','aset_penyusutan.aset_id')
                        ->get('nama_aset','nama_sekolah','status','id_susut');

        // return $penyusutan;
        return view('admin.laporan.aset.kartu-aset', [
            'title' => 'Kartu Aset',
            'susut' => $penyusutan
        ]);

    }

    public function detail_kartu_aset(Request $request)
    {
        
        $penyusutan = DB::table('penyusutans')
                        ->select('asets.nama_aset','sekolahs.nama_sekolah','asets.status','penyusutans.id as id_susut','asets.tahun','asets.harga_beli','penyusutans.masa_manfaat', 'penyusutans.nilai_penyusutan_per_tahun as per_tahun', 'penyusutans.nilai_penyusutan_per_bulan as per_bulan','penyusutans.estimasi_nilai_sisa')
                        ->join('sekolahs','sekolahs.id','=','penyusutans.sekolah_id')
                        ->join('aset_penyusutan','aset_penyusutan.penyusutan_id','=','penyusutans.id')
                        ->join('asets','asets.id','=','aset_penyusutan.aset_id')
                        ->where('penyusutans.id', $request->id)
                        ->get('nama_aset','nama_sekolah','status','id_susut', 'tahun', 'harga_beli', 'masa_manfaat','per_tahun','per_bulan','estimasi_nilai_sisa');
        
        return view('admin.laporan.aset.detail-kartu-aset', [
            'title' => 'Detail Kartu Aset',
            'susut' => $penyusutan
        ]);
    }
}
