<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelNilaiSubKriteriaCalonKaryawanSaw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_sub_calon_karyawan_saw', function (Blueprint $table) {
            $table->increments('id_nilai_sub_kriteria');
            $table->integer('id_calon_karyawan')->unsigned();
            $table->char('id_sub_kriteria',3);
            $table->integer('nilai_sub_kriteria');
            $table->foreign('id_calon_karyawan')->references('id_calon_karyawan')->on('calon_karyawan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_sub_kriteria')->references('id_sub_kriteria')->on('sub_kriteria_ahp')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_sub_calon_karyawan_saw');
    }
}
