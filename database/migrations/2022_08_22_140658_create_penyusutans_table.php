<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyusutans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id');
            // $table->foreignId('aset_id');
            $table->string('masa_manfaat');
            $table->string('nilai_penyusutan_per_tahun');
            $table->string('nilai_penyusutan_per_bulan');
            $table->string('estimasi_nilai_sisa');
            $table->string('akumulasi');
            $table->string('nilai_sisa');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyusutans');
    }
};
