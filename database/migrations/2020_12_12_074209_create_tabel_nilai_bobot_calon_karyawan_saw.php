<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelNilaiBobotCalonKaryawanSaw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_bobot_calon_karyawan', function (Blueprint $table) {
            $table->char('id_bobotcalon_karyawan',3)->primary();
            $table->char('id_nilai',3);
            $table->decimal('nilai_bobot_calon_karyawan',18,4);
            $table->foreign('id_nilai')->references('id_nilai')->on('nilai_kriteria_calon_karyawan')->onUpdate('cascade')->onDelete('restrict');

           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_bobot_calon_karyawan');
    }
}
