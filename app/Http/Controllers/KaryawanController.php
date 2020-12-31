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
        $tglakhir = date('Y-m-d');
        $tglawal =date('Y-m-d', strtotime('-1 month', strtotime($tglakhir)));
        // echo $tglakhir;
        $tangal = array($tglawal,$tglakhir);

        $bagian=DB::table('bagian')->where('nama_bagian',$nama)->get();
        foreach($bagian as $p){
            $calon=DB::table('calon_karyawan')->where('id_bagian',$p->id_bagian)
            ->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))
            ->get();
        }
        // foreach($calon as $c){
        //     echo $c->id_calon_karyawan;
        // }
        // echo $tangal[0];
        return view("karyawan",['bagian' => $bagian, 'calon'=>$calon,'tgl'=>$tangal]);
    }
    public function search(Request $request){
        $bagian=DB::table('bagian')->where('id_bagian',$request->id_bagian)->get();
        $calon=DB::table('calon_karyawan')->where('id_bagian',$request->id_bagian)
            ->whereBetween('tanggal_daftar',array($request->tgl_awal,$request->tgl_akhir))
            ->get();
        // echo $request->tgl_awal;
        $tangal = array($request->tgl_awal,$request->tgl_akhir);
        return view("karyawan",['bagian' => $bagian, 'calon'=>$calon,'tgl'=>$tangal]);
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
