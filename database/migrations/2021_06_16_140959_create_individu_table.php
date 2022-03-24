<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_individu', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp');
            $table->string('jenis');
            $table->string('nama');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('foto')->nullable();
            $table->string('keluhan_sakit');
            $table->string('riwayat_perjalanan');
            $table->string('lokasi_geom');
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
        Schema::dropIfExists('data_individu');
    }
}
