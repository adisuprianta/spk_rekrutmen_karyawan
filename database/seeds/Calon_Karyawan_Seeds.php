<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Calon_Karyawan_Seeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calon_karyawan')->insert([
            [
                'id_hrd'=>2,
                'id_bagian'=>'bg0',
                'Nama_Calon_karyawan'=>'adi',
                'Email'=>'adisuprianta13@gmail.com',
                'No_Hp'=>'081936124448',
                'Approve'=>'1',
                'jekel'=>'L',
                'alamat'=>'surabaya',
                'Tanggal_daftar'=>'2020-12-28',
                'Pendidikan'=>'s1',
                'Tanggal_lahir'=>'2000-12-28',
                'nama_berkas'=>'2020-12-28 12-29-25_adi bg0.zip'
            ],
            [
                'id_hrd'=>2,
                'id_bagian'=>'bg0',
                'Nama_Calon_karyawan'=>'ketut',
                'Email'=>'adisuprianta13@gmail.com',
                'No_Hp'=>'081936124448',
                'Approve'=>'1',
                'jekel'=>'L',
                'alamat'=>'surabaya',
                'Tanggal_daftar'=>'2020-12-28',
                'Pendidikan'=>'s1',
                'Tanggal_lahir'=>'2000-12-28',
                'nama_berkas'=>'2020-12-28 13-44-40_ketut bg0.zip'
            ],
            [
                'id_hrd'=>1,
                'id_bagian'=>'bg0',
                'Nama_Calon_karyawan'=>'adisuprianata',
                'Email'=>'adisuprianta13@gmail.com',
                'No_Hp'=>'081936124448',
                'Approve'=>'1',
                'jekel'=>'P',
                'alamat'=>'surabaya',
                'Tanggal_daftar'=>'2020-12-30',
                'Pendidikan'=>'s1',
                'Tanggal_lahir'=>'2000-12-28',
                'nama_berkas'=>'2020-12-29 14-00-09_adi suprianta bg0.zip'
            ]
            
            
        ]);
    }
}
