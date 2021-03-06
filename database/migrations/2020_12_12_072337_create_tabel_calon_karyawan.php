<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelCalonKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_karyawan', function (Blueprint $table) {
            $table->char('id_calon_karyawan',3)->primary();
            $table->integer('id_hrd')->unsigned();
            $table->char('id_bagian',3);
            $table->string('Nama_Calon_karyawan',30);
            $table->string('Email',20);
            $table->string('No_Hp',13);
            $table->string('Alamat',50);
            $table->string('NIK',16);
            $table->date('Tanggal_daftar');
            $table->string('Pendidikan',20);
            $table->date('Tanggal_Lahir');
            $table->foreign('id_bagian')->references('id_bagian')->on('bagian')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_hrd')->references('id_hrd')->on('login_hrd')->onUpdate('cascade')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calon_karyawan');
    }
}
