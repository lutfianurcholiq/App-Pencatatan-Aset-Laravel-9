<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurnalController extends Controller
{
    public function index()
    {

        $cari = DB::table('jurnals')
                    ->select('jurnals.*','coas.nama_coa','coas.no_coa','sekolahs.nama_sekolah')
                    ->join('coas','coas.id','=','jurnals.coa_id')
                    ->join('penyusutans','penyusutans.id','=','jurnals.penyusutan_id')
                    ->join('sekolahs','sekolahs.id','=','penyusutans.sekolah_id')
                    ->get();
        
        return view('admin.laporan.jurnal.index', [
            'title' => 'Jurnal',
            'jurnals' => $cari
        ]);
    }

    public function cari_tanggal(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);
        
        $tgl_awal = $request->tanggal_awal;
        $tgl_akhir = $request->tanggal_akhir;

        if($request->tanggal_awal != NULL){

            $cari = DB::table('jurnals')
                        ->select('jurnals.*','coas.nama_coa','coas.no_coa','sekolahs.nama_sekolah')
                        ->join('coas','coas.id','=','jurnals.coa_id')
                        ->join('penyusutans','penyusutans.id','=','jurnals.penyusutan_id')
                        ->join('sekolahs','sekolahs.id','=','penyusutans.sekolah_id')
                        ->where('tgl_jurnal','>=', $tgl_awal)
                        ->where('tgl_jurnal','<=', $tgl_akhir)
                        ->get();
            return view('admin.laporan.jurnal.index', [
                        'title' => 'Jurnal',
                        'jurnals' => $cari
            ]);
        }

        return view('admin.laporan.jurnal.index', [
            'title' => 'Jurnal',
            'jurnals' => Jurnal::with('coa')->get()
        ]);


    }
}
