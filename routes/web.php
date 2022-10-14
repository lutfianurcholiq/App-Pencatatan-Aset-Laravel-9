<?php

use App\Models\Sekolah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SelectedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenyusutanController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
})->middleware('auth');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Aset
Route::resource('/aset', AsetController::class)->middleware(['auth','staff']);

// Maps
Route::get('/maps', [MapsController::class, 'index'])->middleware(['auth','staff']);

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->middleware('auth');

// User
Route::resource('/activeUser', UserController::class)->middleware(['auth','admin']);

// Coa
Route::resource('/coa', CoaController::class)->middleware(['auth','staff']);

// Penyusutan
Route::get('/penyusutan', [PenyusutanController::class, 'index'])->middleware(['auth','staff']);
Route::post('/penyusutan', [PenyusutanController::class, 'store'])->middleware(['auth','staff']);
// Route::get('/penyusutan/kartu_aset/{id}', [PenyusutanController::class, 'kartu_aset'])->middleware('auth');
Route::get('/penyusutan/getaset/{id}', [SelectedController::class, 'getAset']);

// Laporan
Route::get('/laporan/kartu_aset', [LaporanController::class, 'kartu_aset'])->middleware(['auth','manager']);
Route::get('/laporan/kartu_aset/detail/{id}', [LaporanController::class, 'detail_kartu_aset'])->middleware(['auth','manager']);
Route::get('/jurnal', [JurnalController::class, 'index'])->middleware(['auth','manager']);
Route::post('/jurnal', [JurnalController::class,'cari_tanggal'])->middleware(['auth','manager']);

// Sekolah
Route::resource('/sekolah', SekolahController::class)->middleware(['auth','staff']);
Route::get('/sekolah/getkecamatan/{id}', [SelectedController::class, 'getKecamatan']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Registration
Route::get('/registration', [RegistrationController::class, 'index']);
Route::post('/registration', [RegistrationController::class, 'store']);

// // error
// Route::get('/403', function() {
//     return view('error.403');
// });

// Map Persebaran - Publik
Route::get('/maps-public', function (){
    return view('publik.maps', [
        'sekolahs' => Sekolah::all()
    ]);
});
