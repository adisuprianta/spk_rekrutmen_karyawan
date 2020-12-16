<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class SubKriteria_Controller extends Controller
{   
    //manggil halaman sub kriteria
    //memangil halaman tespraktik
    public function tespraktik(){
        return view('tespraktik');
    }
    
    //memangil halaman teswawancaraproduksi
    public function teswawancarap(){
        return view('teswawancaraproduksi');
    }

    //memangil halaman teswawancaraproduksi
    public function psikotes(){
        return view('psikotes');
    }

    //memanggil halaman tes wawancara non produksi
    public function wawancaran(){
        return view('teswawancaranonproduksi');
    }
    //hitung sub kriteria

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

        //tes wawancaara produksi
        public function updateteswawancarap(Request $request){
            $kar = $request->karakter;
            $mapk = $request->masa_kerja;
            $kom=$request->komunikasi;
            $att=$request->attitude;
            
        
            $k=array(                   //k1            //k2            //k3            //4     
                                    array(1,            $kar/$mapk,     $kar/$kom,       $kar/$att),	        //K1								
                                    array($mapk/$kar,    1,              $mapk/$kom,      $mapk/$att),	//K2					                           
                                    array($kom/$kar,     $kom/$mapk,       1,             $kom/$att),	//K3
                                    array($att/$kar,     $att/$mapk,     $att/$kom,           1)        //K4
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
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','TW1')->update([
                "bobot_sub_kriteria"=>$bobot[0],
                "nilai_perbandingan_sub_kriteria"=>$kar
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tw2')->update([
                "bobot_sub_kriteria"=>$bobot[1],
                "nilai_perbandingan_sub_kriteria"=>$mapk
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tw3')->update([
                "bobot_sub_kriteria"=>$bobot[2],
                "nilai_perbandingan_sub_kriteria"=>$kom
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Tw4')->update([
                "bobot_sub_kriteria"=>$bobot[3],
                "nilai_perbandingan_sub_kriteria"=>$att
            ]);
            Session::flash('sukses','Berhasil menghitung bobot sub kriteria tes wawancara');
            return  redirect('/kriteria/produksi');

            // return $bobot[1]." ".$mapk;
        }


        //psikotes
        public function updatepsikotes(Request $request){
            $kep = $request->kepribadian;
            $moral = $request->moral;
            $kepem=$request->kepemimpinan;
            
        
            $k=array(                   //k1            //k2            //k3            //4     
                                    array(1,            $kep/$moral,     $kep/$kepem),	        //K1								
                                    array($moral/$kep,    1,              $moral/$kepem),	//K2					                           
                                    array($kepem/$kep,     $kepem/$moral,       1)	//K3
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
            // return $bobot[0]." ".$kep;
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','ps1')->update([
                "bobot_sub_kriteria"=>$bobot[0],
                "nilai_perbandingan_sub_kriteria"=>$kep
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','ps2')->update([
                "bobot_sub_kriteria"=>$bobot[1],
                "nilai_perbandingan_sub_kriteria"=>$moral
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','ps3')->update([
                "bobot_sub_kriteria"=>$bobot[2],
                "nilai_perbandingan_sub_kriteria"=>$kepem
            ]);
            Session::flash('sukses','Berhasil menghitung bobot sub kriteria psikotes');
            return  redirect('/kriteria/nonproduksi');
        }

        //wawancaranonproduksi
        public function updatewawancaran(Request $request){
            $kar = $request->karakter;
            $mapk = $request->masa_kerja;
            $kom=$request->komunikasi;
            $att=$request->attitude;
            
        
            $k=array(                   //k1            //k2            //k3            //4     
                                    array(1,            $kar/$mapk,     $kar/$kom,       $kar/$att),	        //K1								
                                    array($mapk/$kar,    1,              $mapk/$kom,      $mapk/$att),	//K2					                           
                                    array($kom/$kar,     $kom/$mapk,       1,             $kom/$att),	//K3
                                    array($att/$kar,     $att/$mapk,     $att/$kom,           1)        //K4
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
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','NW1')->update([
                "bobot_sub_kriteria"=>$bobot[0],
                "nilai_perbandingan_sub_kriteria"=>$kar
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Nw2')->update([
                "bobot_sub_kriteria"=>$bobot[1],
                "nilai_perbandingan_sub_kriteria"=>$mapk
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Nw3')->update([
                "bobot_sub_kriteria"=>$bobot[2],
                "nilai_perbandingan_sub_kriteria"=>$kom
            ]);
            DB::table('sub_kriteria_ahp')->where('id_sub_kriteria','Nw4')->update([
                "bobot_sub_kriteria"=>$bobot[3],
                "nilai_perbandingan_sub_kriteria"=>$att
            ]);
            Session::flash('sukses','Berhasil menghitung bobot sub kriteria tes wawancara');
            return  redirect('/kriteria/nonproduksi');

            // return $bobot[1]." ".$mapk;
        }
}
