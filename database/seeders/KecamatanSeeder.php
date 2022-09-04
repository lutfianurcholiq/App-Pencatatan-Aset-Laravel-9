<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kecamatan::create([
            'kota_id' => 1,
            'nama_kecamatan' => 'Kec.Babakan',
        ]);
        Kecamatan::create([
            'kota_id' => 1,
            'nama_kecamatan' => 'Kec.DayeuhKolot',
        ]);
        Kecamatan::create([
            'kota_id' => 1,
            'nama_kecamatan' => 'Kec.Antapani',
        ]);
        Kecamatan::create([
            'kota_id' => 1,
            'nama_kecamatan' => 'Kec.Kopo',
        ]);
    }
}
