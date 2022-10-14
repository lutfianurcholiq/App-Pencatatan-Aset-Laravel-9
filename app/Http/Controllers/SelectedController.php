<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectedController extends Controller
{
    
    public function getKecamatan(Request $request)
    {
        $kecamatan = Kecamatan::where('kota_id', $request->id)->pluck('nama_kecamatan', 'id');

        return response()->json($kecamatan);
    }

    public function getAset(Request $request)
    {

        // $aset = Aset::where('sekolah_id', $request->id)->get('id',['nama_aset']);
        $aset = Aset::where('sekolah_id', $request->id)->pluck('nama_aset','id');
        // $aset = Aset::where('sekolah_id', $request->id)->select('nama_aset','id');

        // return $aset->toJson();
        return response()->json($aset);
    }
}
