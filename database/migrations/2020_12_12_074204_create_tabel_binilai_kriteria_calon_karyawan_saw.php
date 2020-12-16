<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelBinilaiKriteriaCalonKaryawanSaw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kriteria_calon_karyawan', function (Blueprint $table) {
            $table->char('id_nilai',3)->primary();
            $table->integer('id_calon_karyawan')->unsigned();
            $table->char('id_kriteria',3);
            $table->integer('nilai_kriteria');
            $table->foreign('id_calon_karyawan')->references('id_calon_karyawan')->on('calon_karyawan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria_ahp')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_kriteria_calon_karyawan');
    }
}
