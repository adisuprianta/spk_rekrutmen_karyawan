<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class SubKriteria_Controller extends Controller
{
    public function tespraktik(){
        return view('tespraktik');
    }

    //subkriteria

    //tespraktik
    public function updatetespraktik(Request $request){
            $ker = $request->kerjasama;
            $kre = $request->kriativitas;
            $ket=$request->ketrampilan;
            
        
            $k=array(                   //k1            //k2            //k3            //4     
                                    array(1,            $ker/$kre,     $ker/$ket),	        //K1								
                                    array($kre/$ker,    1,              $kre/$ket),	//K2					                           
                                    array($ket/$ker,     $ket/$kre,       1)	//K3
            );

            $jumlah=array();
            // echo $k[0][2];
            for($i=0;$i<count($k[0]);$i++){
                $jumlah[$i] = 0;
                for($j=0;$j<count($k[0]);$j++){
                    $jumlah[$i]=$jumlah[$i]+$k[$j][$i];
                    
                }
            }

            

            // // echo "<br>".$k[0][1]
            $normalisi = array();
            for($i=0;$i<count($jumlah);$i++){
                
                for($j=0; $j< count($k[0]);$j++){
                    $normalisi[$i][$j] = $k[$j][$i] / $jumlah[$i]; 
                }
            }
            // return $normalisi[0][1];
            
            // menjumlahkan
            $jn=array();
            for($i=0;$i<count($jumlah);$i++){
                $jn[$i]=0;
                for($j=0; $j< count($k[0]);$j++){
                $jn[$i]+= $normalisi[$j][$i] ;
                    // echo $normalisi[$j][$i]."aku" ;
                }
            }
            // return $jn[1];

            $bobot = array();
            for($i=0;$i<count($jumlah);$i++){
                $bobot[$i]=$jn[$i]/count($jn);
            }
            // return $bobot[0]." ".$ker;
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tp1')->update([
                "bobot_sub_kriteria"=>$bobot[0],
                "nilai_perbandingan_sub_kriteria"=>$ker
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tp2')->update([
                "bobot_sub_kriteria"=>$bobot[1],
                "nilai_perbandingan_sub_kriteria"=>$kre
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tp3')->update([
                "bobot_sub_kriteria"=>$bobot[2],
                "nilai_perbandingan_sub_kriteria"=>$ket
            ]);
            Session::flash('sukses','Berhasil menghitung bobot sub kriteria tes praktik');
            return  redirect('/kriteria/produksi');
        }

        //tes wawancaara
        public function updateteswawancara(Request $request){
            $ker = $request->kerjasama;
            $kre = $request->kriativitas;
            $ket=$request->ketrampilan;
            
        
            $k=array(                   //k1            //k2            //k3            //4     
                                    array(1,            $ker/$kre,     $ker/$ket),	        //K1								
                                    array($kre/$ker,    1,              $kre/$ket),	//K2					                           
                                    array($ket/$ker,     $ket/$kre,       1)	//K3
            );

            $jumlah=array();
            // echo $k[0][2];
            for($i=0;$i<count($k[0]);$i++){
                $jumlah[$i] = 0;
                for($j=0;$j<count($k[0]);$j++){
                    $jumlah[$i]=$jumlah[$i]+$k[$j][$i];
                    
                }
            }

            

            // // echo "<br>".$k[0][1]
            $normalisi = array();
            for($i=0;$i<count($jumlah);$i++){
                
                for($j=0; $j< count($k[0]);$j++){
                    $normalisi[$i][$j] = $k[$j][$i] / $jumlah[$i]; 
                }
            }
            // return $normalisi[0][1];
            
            // menjumlahkan
            $jn=array();
            for($i=0;$i<count($jumlah);$i++){
                $jn[$i]=0;
                for($j=0; $j< count($k[0]);$j++){
                $jn[$i]+= $normalisi[$j][$i] ;
                    // echo $normalisi[$j][$i]."aku" ;
                }
            }
            // return $jn[1];

            $bobot = array();
            for($i=0;$i<count($jumlah);$i++){
                $bobot[$i]=$jn[$i]/count($jn);
            }
            // return $bobot[0]." ".$ker;
            // DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tp1')->update([
            //     "bobot_sub_kriteria"=>$bobot[0],
            //     "nilai_perbandingan_sub_kriteria"=>$ker
            // ]);
            // DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tp2')->update([
            //     "bobot_sub_kriteria"=>$bobot[1],
            //     "nilai_perbandingan_sub_kriteria"=>$kre
            // ]);
            // DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tp3')->update([
            //     "bobot_sub_kriteria"=>$bobot[2],
            //     "nilai_perbandingan_sub_kriteria"=>$ket
            // ]);
            // Session::flash('sukses','Berhasil menghitung bobot sub kriteria tes praktik');
            // return  redirect('/kriteria/produksi');
        }
}
