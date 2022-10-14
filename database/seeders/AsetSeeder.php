<?php

namespace Database\Seeders;

use App\Models\Aset;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aset::create([
            'sekolah_id' => 1,
            'jenis_aset' => 'aset tetap',
            'nama_aset' => 'GEDUNG AULA',
            'tahun' => '2020',
            'harga_beli' => 120000000,
            'foto_aset' => 'testing',
            'status' => 'belum disusutkan'
        ]);

        Aset::create([
            'sekolah_id' => 2,
            'jenis_aset' => 'aset tetap',
            'nama_aset' => 'GEDUNG BASKET',
            'tahun' => '2020',
            'harga_beli' => 120000000,
            'foto_aset' => 'testing',
            'status' => 'belum disusutkan'
        ]);

        Aset::create([
            'sekolah_id' => 3,
            'jenis_aset' => 'aset tetap',
            'nama_aset' => 'LAPANGAN TENIS',
            'tahun' => '2020',
            'harga_beli' => 120000000,
            'foto_aset' => 'testing',
            'status' => 'belum disusutkan'
        ]);

        Aset::create([
            'sekolah_id' => 1,
            'jenis_aset' => 'aset tetap',
            'nama_aset' => 'GEDUNG LAB KOMPUTER',
            'tahun' => '2020',
            'harga_beli' => 190000000,
            'foto_aset' => 'testing',
            'status' => 'belum disusutkan'
        ]);

        Aset::create([
            'sekolah_id' => 2,
            'jenis_aset' => 'aset tetap',
            'nama_aset' => 'LAPANGAN',
            'tahun' => '2010',
            'harga_beli' => 180000000,
            'foto_aset' => 'testing',
            'status' => 'belum disusutkan'
        ]);

        Aset::create([
            'sekolah_id' => 1,
            'jenis_aset' => 'aset tetap',
            'nama_aset' => 'GEDUNG 20 LANTAI',
            'tahun' => '2008',
            'harga_beli' => 150000000,
            'foto_aset' => 'testing',
            'status' => 'belum disusutkan'
        ]);

        Aset::create([
            'sekolah_id' => 3,
            'jenis_aset' => 'aset tetap',
            'nama_aset' => 'GEDUNG DIATAS LANGIT',
            'tahun' => '2020',
            'harga_beli' => 110000000,
            'foto_aset' => 'testing',
            'status' => 'belum disusutkan'
        ]);
    }
}
