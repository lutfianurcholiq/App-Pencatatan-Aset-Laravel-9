<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class SelectedController extends Controller
{
    
    public function getKecamatan(Request $request)
    {
        $kecamatan = Kecamatan::where('kota_id', $request->id)->pluck('nama_kecamatan', 'id');

        return response()->json($kecamatan);
    }

    public function getAset(Request $request)
    {
        $aset = Aset::where('sekolah_id', $request->id)->pluck('nama_aset.status','id');
        // $aset = Aset::where('sekolah_id', $request->id)->get('id','nama_aset');

        return response()->json($aset);
        // return $aset;
    }
}
