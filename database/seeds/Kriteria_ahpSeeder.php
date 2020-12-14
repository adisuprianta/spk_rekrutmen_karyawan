<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Kriteria_ahpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria_ahp')->insert([
            [
                'id_kriteria'=>'kp1',
                'id_bagian'=>'bg0',
                'nama_kriteria'=>'Kedisiplinan',
                'bobot_kriteria'=>'0',
                'nilai_perbandingan_kriteria'=>'0'
            ],
            [
                'id_kriteria'=>'kp2',
                'id_bagian'=>'bg0',
                'nama_kriteria'=>'Tes Praktik',
                'bobot_kriteria'=>'0',
                'nilai_perbandingan_kriteria'=>'0'
            ]
            ,
            [
                'id_kriteria'=>'kp3',
                'id_bagian'=>'bg0',
                'nama_kriteria'=>'Tes Wawancara',
                'bobot_kriteria'=>'0',
                'nilai_perbandingan_kriteria'=>'0'
            ],
            
            [
                'id_kriteria'=>'kn1',
                'id_bagian'=>'bg1',
                'nama_kriteria'=>'Kedisiplinan',
                'bobot_kriteria'=>'0',
                'nilai_perbandingan_kriteria'=>'0'
            ],
            [
                'id_kriteria'=>'kn2',
                'id_bagian'=>'bg1',
                'nama_kriteria'=>'Tes Tulis',
                'bobot_kriteria'=>'0',
                'nilai_perbandingan_kriteria'=>'0'
            ]
            ,
            [
                'id_kriteria'=>'kn3',
                'id_bagian'=>'bg1',
                'nama_kriteria'=>'Tes Wawancara',
                'bobot_kriteria'=>'0',
                'nilai_perbandingan_kriteria'=>'0'
            ],
            [
                'id_kriteria'=>'kn4',
                'id_bagian'=>'bg1',
                'nama_kriteria'=>'Tes Psikotes',
                'bobot_kriteria'=>'0',
                'nilai_perbandingan_kriteria'=>'0'
            ]
        ]);
    }
}
