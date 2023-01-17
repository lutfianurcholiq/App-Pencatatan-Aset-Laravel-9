<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Support\Facades\DB;

class MapsController extends Controller
{
    
    public function index()
    {

        $jmlh_aset = DB::table('asets')
                        ->select(DB::raw('COUNT(asets.id) as jmlh_aset'))
                        ->join('sekolahs','sekolahs.id','=','asets.sekolah_id')
                        ->groupBy('sekolahs.id')
                        ->get();

        $aset_sklh = DB::table('sekolahs')
                        ->select('sekolahs.id','sekolahs.nama_sekolah','sekolahs.lokasi','sekolahs.foto','asets.id as id_aset','asets.nama_aset','asets.tahun','asets.harga_beli','asets.status','asets.sekolah_id')
                        ->join('asets','asets.sekolah_id','=','sekolahs.id')
                        ->groupBy('sekolahs.nama_sekolah')
                        ->orderBy('sekolahs.id')
                        ->get();

        // return $aset_sklh;
        // return $jmlh_aset;

        return view('admin.maps.index', [
            'sekolahs' => Sekolah::all(),
            'aset' => $aset_sklh,
            // 'asets' => $aset,
            'jmlh' => $jmlh_aset
            // 'asets_detail' => $aset_detail
        ]);
    }
}
