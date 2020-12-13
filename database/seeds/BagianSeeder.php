<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array("Produksi","NonProduksi");
        for($i=0;$i<=1;$i++){
            DB::table('bagian')->insert([
                "id_bagian"=>"bg".$i,
                "nama_bagian"=>$data[$i]
            ]);
        }
    }
}
