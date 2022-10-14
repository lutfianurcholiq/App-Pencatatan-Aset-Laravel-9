<?php

namespace Database\Seeders;

use App\Models\Coa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coa::create([
            'no_coa' => 114,
            'nama_coa' => 'Akumulasi Penyusutan Gedung',
            'jenis_coa' => 1,
            'saldo_awal' => 0
        ]);
        Coa::create([
            'no_coa' => 601,
            'nama_coa' => 'Beban Akumulasi Penyusutan Gedung',
            'jenis_coa' => 5,
            'saldo_awal' => 0
        ]);
    }
}
