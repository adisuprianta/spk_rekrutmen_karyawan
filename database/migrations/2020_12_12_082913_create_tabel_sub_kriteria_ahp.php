<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelSubKriteriaAhp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriteria_ahp', function (Blueprint $table) {
            $table->char('id_sub_kriteria',3)->primary();
            $table->char('id_kriteria',3);
            
            $table->string('nama_sub_kriteria',20);
            $table->decimal('bobot_sub_kriteria',4,4);
            $table->integer('nilai_perbandingan_sub_kriteria');
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
        Schema::dropIfExists('sub_kriteria_ahp');
    }
}
