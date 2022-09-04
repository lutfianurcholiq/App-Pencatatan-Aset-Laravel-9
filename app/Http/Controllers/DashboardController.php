<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kecamatan;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $aset = Sekolah::all()->count();
        $kecamatan = Sekolah::with('kecamatan')->get('kecamatan_id')->count();
        $kcmtn = Kecamatan::pluck('nama_kecamatan');
        // return $kcmtn;
        $negeri = Sekolah::where('kategori','Negeri')->count();
        $swasta = Sekolah::where('kategori','Swasta')->count();
        return view('admin.dashboard.index', [
            'asets' => $aset,
            'negeris' => $negeri,
            'swastas' => $swasta,
            'kcmtn' => $kcmtn,
            'kecamatan' => $kecamatan
        ]);
    }
}
