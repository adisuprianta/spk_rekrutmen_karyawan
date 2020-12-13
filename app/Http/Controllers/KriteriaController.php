<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(){
        return view("kriteria");
    }
    public function panggil(Request $request){
        // if(){

        // }else{

        // }
        return view('kriteria'.$request->pilihbagian);
    }
}
