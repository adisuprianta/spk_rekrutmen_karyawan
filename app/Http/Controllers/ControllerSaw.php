<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ControllerSaw extends Controller
{
    public function inputsaw($nama_bagian,$id){
        $karyawan = DB::table('calon_karyawan')->where('id_calon_karyawan',$id)->get();
        // $karyawan = $request->id_karyawan;
        // $karyawan = $id;
        return view('inputnilaisaw',['karyawan' => $karyawan]);
        // return $karyawan;
    }
}
