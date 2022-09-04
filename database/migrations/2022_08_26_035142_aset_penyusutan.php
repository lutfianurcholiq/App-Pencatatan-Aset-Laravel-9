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
        Schema::create('aset_penyusutan', function (Blueprint $table) {
            $table->foreignId('penyusutan_id');
            $table->foreignId('aset_id');
            $table->integer('total_akhir');
            $table->primary(['penyusutan_id','aset_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aset_penyusutan');
    }
};
