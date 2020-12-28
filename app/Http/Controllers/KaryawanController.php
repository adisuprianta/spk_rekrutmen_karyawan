<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
class KaryawanController extends Controller
{
    // public function produksi(){
    //     return view("karyawanproduksi");
    // }
    public function karyawan($nama){
        $bagian=DB::table('bagian')->where('nama_bagian',$nama)->get();
        foreach($bagian as $p){
        $calon=DB::table('calon_karyawan')->where('id_bagian',$p->id_bagian)->get();
        }
        return view("karyawan",['bagian' => $bagian, 'calon'=>$calon]);
    }
    // public function panggil(Request $request){
    //     // if(){

    //     // }else{

    //     // }
    //     return view('kriteria'.$request->pilihbagian);
    // }
    public function karyawaninput($id){
        
            return view('inputkaryawan',['id'=>$id]);
            // return Auth::user()->id;
        
    }

    public function input(Request $request){
        
        $this->validate($request, [
			'file' => 'required',
        ]);
        
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
        
        $nama_file = date('Y-m-d H-i-s')."_".$request->nama." ".$request->id_bagian.".".$file->getClientOriginalExtension();
                // nama file
        
        
        $tujuan_upload = 'berkas_file';
        $file->move($tujuan_upload,$nama_file);
        // return $nama_file;
        // menyimpan data file yang diupload ke variabel $file
        // $file = $request->file('file');
        


        // return $file->getClientOriginalName();

        DB::table('calon_karyawan')->insert([
            'id_hrd'=>Auth::user()->id,
            'id_bagian'=>$request->id_bagian,
            'nama_calon_karyawan'=>$request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->nohp,
            'jekel'=>$request->jenis_kelamin,
            'approve'=>0,
            'alamat'=>$request->alamat,
            'Tanggal_daftar'=>(new datetime()),
            'pendidikan'=>$request->pendidikan,
            'tanggal_lahir'=>$request->tgl_lahir,
            'nama_berkas'=>$nama_file
        ]);
        $bagian=DB::table('bagian')->where('id_bagian',$request->id_bagian,)->get();
        foreach( $bagian as $p){
            return redirect('/home/'.$p->nama_bagian);
        }
            // return redirect('/home/$ba');
        
    }
    public function karyawanCheck($id,$val){
        if($val == 'approved'){
            $up = DB::table('calon_karyawan')->where('id_calon_karyawan',$id)->update([
                'approve' => '1'
            ]);
        }else{
            $up = DB::table('calon_karyawan')->where('id_calon_karyawan',$id)->update([
                'approve' => '0'
            ]);
        }
        
    }
}
