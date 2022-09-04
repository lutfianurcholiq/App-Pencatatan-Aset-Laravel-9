<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    
    public function index()
    {
        return view('admin.maps.index', [
            'sekolahs' => Sekolah::all()
        ]);
    }
}
