<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KriteriaController extends Controller
{
    public function index(){
        return view("kriteria");
    }
    public function panggil(Request $request){
        if(strcmp($request->pilihbagian,'1')==0){
            return redirect('/kriteria/produksi');
        }else{
            return redirect('/kriteria/kriterianonproduksi');
        }
        
        // }else{

        // }
        // return view('kriteria'.$request->pilihbagian);
    }
    public function produksi(){
        return view('kriteriaproduksi');
    }
    public function nonproduksi(){
        return view('kriterianonproduksi');
    }
    public function updateproduksi(Request $request){
        // DB::table('pegawai')->where('pegawai_id',$request->id)->update([
        //     'pegawai_nama' => $request->nama,
        //     'pegawai_jabatan' => $request->jabatan,
        //     'pegawai_umur' => $request->umur,
        //     'pegawai_alamat' => $request->alamat
        // ]);
        
        // alihkan halaman ke halaman pegawai 
        // return redirect('/kriteria');

        

        return  $request->nilai_kidisipilnan;
        
    }
}
