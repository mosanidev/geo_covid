<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasikarantinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasikarantina', function (Blueprint $table) {
            $table->id();
            $table->string("kode_provinsi");
            $table->string("nama_provinsi");
            $table->string("nama_kabupaten");
            $table->string("nama_kabupaten");
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
        Schema::table('lokasikarantina', function (Blueprint $table) {
            $table->dropColumn(['kode_provinsi', 'nama_provinsi', 'kode_kabupaten', 'nama_kabupaten']);
        });
        Schema::dropIfExists('lokasikarantina');
        
        
    }
}
