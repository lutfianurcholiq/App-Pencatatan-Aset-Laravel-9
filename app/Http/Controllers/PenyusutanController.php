<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Jurnal;
use App\Models\Sekolah;
use App\Models\Penyusutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyusutanController extends Controller
{
    
    public function index(Request $request)
    {
        // return $request;
        $penyusutan = Penyusutan::get();

        if($request->sekolah_id != null and $request->cari_aset == null)
        {
            // return $request;
            $asets = DB::table('sekolahs')
                        ->select('asets.nama_aset','asets.status','asets.tahun','sekolahs.id as sekolah','sekolahs.nama_sekolah', 'asets.tahun','asets.harga_beli','asets.id as aset','sekolahs.id as sekolah')
                        ->join('asets','sekolahs.id','=','asets.sekolah_id')
                        ->where('sekolahs.id', $request->sekolah_id )
                        ->get('nama_aset','status','tahun','nama_sekolah','harga_beli','aset','sekolah');
            // return $asets;
            return view('admin.penyusutan.index', [
                        // 'title_aset' => "Aset Sekolah",
                        'title' => "Detail Penyusutan",
                        'sekolahs' => Sekolah::all(),
                        'aset' => $asets
            ]);
            
        }elseif($request->cari_aset != null)
        {
            // return $request;
            $asets = DB::table('sekolahs')
                        ->select('asets.id as aset','asets.nama_aset','sekolahs.id as sekolah','sekolahs.nama_sekolah', 'asets.tahun','asets.harga_beli','asets.status')
                        ->join('asets','sekolahs.id','=','asets.sekolah_id')
                        ->where('asets.id', $request->cari_aset )
                        ->get('aset','sekolah','nama_sekolah','nama_aset', 'tahun', 'harga_beli');
            
            // return $asetss;

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
            'nilai_penyusutan_per_tahun' => 'integer',
            'nilai_penyusutan_per_bulan' => 'integer',

        ]);

        $akumulasi = $request->nilai_penyusutan_per_bulan;

        $nilai_sisa = $request->harga_beli - $request->nilai_penyusutan_per_bulan;

        // $susut = Penyusutan::get('id')->count();

        $penyusutan = Penyusutan::create([
            'sekolah_id' => $request->sekolah_id,
            // 'aset_id' => $request->aset_id,
            'masa_manfaat' => $request->masa_manfaat,
            'nilai_penyusutan_per_tahun' => $request->nilai_penyusutan_per_tahun,
            'nilai_penyusutan_per_bulan' => $request->nilai_penyusutan_per_bulan,
            'estimasi_nilai_sisa' => $request->estimasi_nilai_sisa,
            'akumulasi' => $akumulasi,
            'nilai_sisa' => $nilai_sisa,
            'status' => 'telah disusutkan'
        ]);
        
        $penyusutan->asets()->sync([
            'aset_id' => $request->aset_id,
            // 'akumulasi' => $akumulasi
        ]);
        
        Aset::where('id', $request->aset_id)->update([
            'status' => 'telah disusutkan'
        ]);

        $susut_id = Penyusutan::get('id')->count();

        Jurnal::create([
            'coa_id' => 2,
            'penyusutan_id' => $susut_id,
            'tgl_jurnal' => date('Y-m-d'),
            'posisi_dr_cr' => 'Debit',
            'nominal' => $request->nilai_penyusutan_per_tahun,
            'keterangan' => 'Susut'
        ]);

        Jurnal::create([
            'coa_id' => 1,
            'penyusutan_id' => $susut_id,
            'tgl_jurnal' => date('Y-m-d'),
            'posisi_dr_cr' => 'Kredit',
            'nominal' => $request->nilai_penyusutan_per_tahun,
            'keterangan' => 'Susut'
        ]);

        return redirect('/penyusutan')->with('success', 'Penyusutan aset berhasil dilakukan');


    }
}
