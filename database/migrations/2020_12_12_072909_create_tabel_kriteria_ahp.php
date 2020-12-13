<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelKriteriaAhp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_ahp', function (Blueprint $table) {
            $table->char('id_kriteria',3)->primary();
            $table->char('id_bagian',3);
            $table->string('Nama_kriteria',20);
            $table->decimal('bobot_kriteria', 4,4);
            $table->integer('Nilai_perbandingan_kriteria');
            $table->foreign('id_bagian')->references('id_bagian')->on('bagian')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_ahp');
    }
}
