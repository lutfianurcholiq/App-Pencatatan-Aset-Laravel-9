<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 1,
            'nama_sekolah' => 'SMA 1 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '2012',
            'jumlah_siswa' => 1000,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.968589262292169,107.63414962442548',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);

        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 2,
            'nama_sekolah' => 'SMA 2 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '2000',
            'jumlah_siswa' => 1000,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.968589262292169,107.63414962442548',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);

        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 2,
            'nama_sekolah' => 'SMA 3 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '1990',
            'jumlah_siswa' => 1000,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.972132064698354,107.64026751396528',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);
        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 2,
            'nama_sekolah' => 'SMA 4 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '1990',
            'jumlah_siswa' => 200,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.972132064698354,107.64026751396528',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);
        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 2,
            'nama_sekolah' => 'SMA 5 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '1990',
            'jumlah_siswa' => 150,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.972132064698354,107.64026751396528',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);
        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 1,
            'nama_sekolah' => 'SMA 6 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '2000',
            'jumlah_siswa' => 250,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.972132064698354,107.64026751396528',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);
        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 1,
            'nama_sekolah' => 'SMA 7 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '2001',
            'jumlah_siswa' => 1500,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.972132064698354,107.64026751396528',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);
        Sekolah::create([
            'kota_id' => 1,
            'kecamatan_id' => 3,
            'nama_sekolah' => 'SMA 8 Bojongsoang',
            'kategori' => 'Swasta',
            'tahun' => '2005',
            'jumlah_siswa' => 900,
            'alamat' => 'Dayeuhkolot',
            'lokasi' => '-6.972132064698354,107.64026751396528',
            'foto' => 'testing',
            'deskripsi' => 'testing'
        ]);
    }
}
