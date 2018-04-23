<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelasiGajiPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relasi_gaji_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pegawai');
            $table->integer('id_jabatan');
            $table->integer('id_divisi');
            $table->integer('total_absensi');
            $table->integer('gaji');
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
        Schema::dropIfExists('relasi_gaji_pegawai');
    }
}
