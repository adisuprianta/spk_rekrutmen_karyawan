<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function produksi(){
        return view("karyawanproduksi");
    }
    public function nonproduksi(){
        return view("karyawannonproduksi");
    }
    // public function panggil(Request $request){
    //     // if(){

    //     // }else{

    //     // }
    //     return view('kriteria'.$request->pilihbagian);
    // }
}
