<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelNilaiBobotSubKriteriaCalonKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_sub_calon_karyawan', function (Blueprint $table) {
            $table->increments('id_bobot_sub');
            $table->integer('id_nilai_sub_kriteria')->unsigned();
            $table->decimal('nilai_bobot_sub_kriteria',18,4);
            $table->foreign('id_nilai_sub_kriteria')->references('id_nilai_sub_kriteria')->on('nilai_sub_calon_karyawan_saw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobot_sub_calon_karyawan');
    }
}
