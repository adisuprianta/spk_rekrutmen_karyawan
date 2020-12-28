<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ControllerSaw extends Controller
{
    public function tampilsaw($nama_bagian,$id){
        $karyawan = DB::table('calon_karyawan')->where('id_calon_karyawan',$id)->get();
        // $karyawan = $request->id_karyawan;
        // $karyawan = $id;
        return view('inputnilaisaw',['karyawan' => $karyawan]);
        // return $karyawan;
    }
    public function inputsaw(Request $request){
        $bagian = $request->id_bagian;
        if($bagian == "bg0"){
            $cek = DB::table('nilai_kriteria_calon_karyawan')->where('id_calon_karyawan',$request->id_karyawan)->get();
            // return count($cek);
            // $cek 
            if(count($cek)==1){
                // kedisiplinana
                DB::table('nilai_kriteria_calon_karyawan')->where('id_calon_karyawan',$request->id_karyawan)->where('id_kriteria','kp1')->update([
                    'nilai_kriteria'=>$request->kedisiplinan
                ]);

                // tes wawancara
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Tw1')->update([
                    'nilai_sub_kriteria'=>$request->karakter
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Tw2')->update([
                    'nilai_sub_kriteria'=>$request->pengalaman
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Tw3')->update([
                    'nilai_sub_kriteria'=>$request->komunikasi
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Tw4')->update([
                    'nilai_sub_kriteria'=>$request->attitude
                ]);

                // tes praktik
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Tp1')->update([
                    'nilai_sub_kriteria'=>$request->kerjasama
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Tp2')->update([
                    'nilai_sub_kriteria'=>$request->kreativitas
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Tp3')->update([
                    'nilai_sub_kriteria'=>$request->ketrampilan
                ]);
                return redirect('home/produksi');
            }else{

                // kedisiplinan
                DB::table('nilai_kriteria_calon_karyawan')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_kriteria'=>'kp1',
                    'nilai_kriteria'=>$request->kedisiplinan
                ]);


                // tes wawancara
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Tw1',
                    'nilai_sub_kriteria'=>$request->karakter
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Tw2',
                    'nilai_sub_kriteria'=>$request->pengalaman
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Tw3',
                    'nilai_sub_kriteria'=>$request->komunikasi
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Tw4',
                    'nilai_sub_kriteria'=>$request->attitude
                ]);
                
                // tes praktik
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Tp1',
                    'nilai_sub_kriteria'=>$request->kerjasama
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Tp2',
                    'nilai_sub_kriteria'=>$request->kreativitas
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Tp3',
                    'nilai_sub_kriteria'=>$request->ketrampilan
                ]);
                return redirect('home/produksi');
            }
            


        }else
        {
            $cek = DB::table('nilai_kriteria_calon_karyawan')->where('id_calon_karyawan',$request->id_karyawan)->where('id_kriteria','kn1')->get();
            // return count($cek)." ".$request->id_karyawan;
            if(count($cek)==1){
                // kedisiplinana
                DB::table('nilai_kriteria_calon_karyawan')->where('id_calon_karyawan',$request->id_karyawan)->where('id_kriteria','kn1')->update([
                    'nilai_kriteria'=>$request->kedisiplinan
                ]);

                // tes tulis
                DB::table('nilai_kriteria_calon_karyawan')->where('id_calon_karyawan',$request->id_karyawan)->where('id_kriteria','kn2')->update([
                    'nilai_kriteria'=>$request->testulis
                ]);

                // tes wawancara NW
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Nw1')->update([
                    'nilai_sub_kriteria'=>$request->karakter
                ]);
                
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Nw2')->update([
                    'nilai_sub_kriteria'=>$request->pengalaman
                ]);
                
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Nw3')->update([
                    'nilai_sub_kriteria'=>$request->komunikasi
                ]);

                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Nw4')->update([
                    'nilai_sub_kriteria'=>$request->attitude
                ]);


                // psikptes

                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Ps1')->update([
                    'nilai_sub_kriteria'=>$request->kepribadian
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Ps2')->update([
                    'nilai_sub_kriteria'=>$request->moral
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->where('id_calon_karyawan',$request->id_karyawan)->where('id_sub_kriteria','Ps2')->update([
                    'nilai_sub_kriteria'=>$request->kepemimpinan
                ]);
                return redirect('home/nonproduksi');
            }else{

                // kedisiplinan
                DB::table('nilai_kriteria_calon_karyawan')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_kriteria'=>'kn1',
                    'nilai_kriteria'=>$request->kedisiplinan
                ]);

                // Tes Tulis
                DB::table('nilai_kriteria_calon_karyawan')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_kriteria'=>'kn2',
                    'nilai_kriteria'=>$request->testulis
                ]);

                
                // tes wawancara
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Nw1',
                    'nilai_sub_kriteria'=>$request->karakter
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Nw2',
                    'nilai_sub_kriteria'=>$request->pengalaman
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Nw3',
                    'nilai_sub_kriteria'=>$request->komunikasi
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Nw4',
                    'nilai_sub_kriteria'=>$request->attitude
                ]);


                // psikotes
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Ps1',
                    'nilai_sub_kriteria'=>$request->kepribadian
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Ps2',
                    'nilai_sub_kriteria'=>$request->moral
                ]);
                DB::table('nilai_sub_calon_karyawan_saw')->insert([
                    'id_calon_karyawan'=>$request->id_karyawan,
                    'id_sub_kriteria'=>'Ps3',
                    'nilai_sub_kriteria'=>$request->kepemimpinan
                ]);
                return redirect('home/nonproduksi');
            }




            return "Hello nonproduksi";
        }
        // return $request->id_karyawan." ".$request->id_bagian;
    }





    public function hitungsaw(){
        $k = DB::table('calon_karyawan')->join('nilai_sub_calon_karyawan_saw','calon_karyawan.id_calon_karyawan','=',
        'nilai_sub_calon_karyawan_saw.id_calon_karyawan')
        ->select('calon_karyawan.id_calon_karyawan','nilai_sub_kriteria')->whereBetween('tanggal_daftar',array('2020-12-26','2020-12-28'))->get();
        foreach($k  as $a){
            echo $a->nilai_sub_kriteria." <br>";
        }
    }
}
