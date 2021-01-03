<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonKaryawanRangking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangking', function (Blueprint $table) {
            $table->integer('id_calon_karyawan')->unsigned();
            $table->decimal('bobot_akhir',18,4);
            $table->integer('rangking');
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
        Schema::dropIfExists('rangking');
    }
}
