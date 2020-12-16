<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelBerkasKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_karyawan', function (Blueprint $table) {
            $table->increments('id_berkas');
            $table->integer('id_calon_karyawan')->unsigned();
            $table->string('nama_berkas');
            $table->foreign('id_calon_karyawan')->references('id_calon_karyawan')->on('calon_karyawan')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_karyawan');
    }
}
