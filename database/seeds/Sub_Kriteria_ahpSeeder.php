<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Sub_Kriteria_ahpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_kriteria_ahp')->insert([
            [
                'id_sub_kriteria'=>'Tp1',
                'id_kriteria'=>'kp2',
                'nama_sub_kriteria'=>'Kerjasama',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Tp2',
                'id_kriteria'=>'kp2',
                'nama_sub_kriteria'=>'Kreativitas',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Tp3',
                'id_kriteria'=>'kp2',
                'nama_sub_kriteria'=>'Ketrampilan',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Tw1',
                'id_kriteria'=>'kp3',
                'nama_sub_kriteria'=>'Karakter',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Tw2',
                'id_kriteria'=>'kp3',
                'nama_sub_kriteria'=>'Masa Pengalaman Kerja',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Tw3',
                'id_kriteria'=>'kp3',
                'nama_sub_kriteria'=>'Komunikasi',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Tw4',
                'id_kriteria'=>'kp3',
                'nama_sub_kriteria'=>'Attitude',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            // non produksi
            [
                'id_sub_kriteria'=>'Nw1',
                'id_kriteria'=>'kn3',
                'nama_sub_kriteria'=>'Karakter',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Nw2',
                'id_kriteria'=>'kn3',
                'nama_sub_kriteria'=>'Masa Pengalaman Kerja',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Nw3',
                'id_kriteria'=>'kn3',
                'nama_sub_kriteria'=>'Komunikasi',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Nw4',
                'id_kriteria'=>'kn3',
                'nama_sub_kriteria'=>'Attitude',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],

            [
                'id_sub_kriteria'=>'Ps1',
                'id_kriteria'=>'kn4',
                'nama_sub_kriteria'=>'Kepribadian',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Ps2',
                'id_kriteria'=>'kn4',
                'nama_sub_kriteria'=>'Moral',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ],
            [
                'id_sub_kriteria'=>'Ps3',
                'id_kriteria'=>'kn4',
                'nama_sub_kriteria'=>'Kepemimpinan',
                'bobot_sub_kriteria'=>'0',
                'nilai_perbandingan_sub_kriteria'=>'0'
            ]

        ]);
    }
}
