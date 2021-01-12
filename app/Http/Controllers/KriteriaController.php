<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class KriteriaController extends Controller
{
    public function index(){
        return view("kriteria");
    }

    // funcition untuk pindah halaman dari kriteria ke kriteria produksi dan non prodksi
    public function panggil(Request $request){
        if(strcmp($request->pilihbagian,'1')==0){
            return redirect('/kriteria/produksi');
        }else{
            return redirect('/kriteria/nonproduksi');
        }
        
        // }else{

        // }
        // return view('kriteria'.$request->pilihbagian);
    }

    //memanggil halaman kriteria produksi dan non produksi
    public function produksi(){
        $a = DB::table('kriteria_ahp')->where('id_bagian','bg0')->get();
        // foreach($a as $aa){
        //     if($aa->id_kriteria=='kn1'&&$aa->Nilai_perbandingan_kriteria==0){
        //         echo $aa->id_kriteria;
        //     }   
            

        // }
        return view('kriteriaproduksi',['kriteria'=>$a]);
    }
    public function nonproduksi(){
        $a = DB::table('kriteria_ahp')->where('id_bagian','bg1')->get();
        return view('kriterianonproduksi',['kriteria'=>$a]);
    }


    //update produksi kriteria
    public function updateproduksi(Request $request){
        $ke=(Double) $request->nilai_kidisipilnan;
        $tesw=(Double) $request->tes_praktek;
        $tesc=(Double) $request->tes_wawancara;
        
        if($ke==0 || $tesw==0 ||$tesc == 0){
            Session::flash('gagal','Gagal menghitung produksi, tidak boleh ada nilai nol');
            return  redirect('/kriteria/produksi');
        }else{
        $k=array(                   //k1    //k2   //k3
                                array(1,          $ke/$tesw , $ke/$tesc),	        //K1								
                                array($tesw/$ke,    1, $tesw/$tesc),	//K2					                           
                                array($tesc/$ke,     $tesc/$tesw, 1),	//K3												                            
                                    
        );
        $jumlah=array();
        // echo $k[0][2];
        for($i=0;$i<count($k[0]);$i++){
            $jumlah[$i] = 0;
            for($j=0;$j<count($k[0]);$j++){
                $jumlah[$i]=$jumlah[$i]+$k[$j][$i];
                
            }
        }
        // echo "<br>".$k[0][1]
        $normalisi = array();
        for($i=0;$i<count($jumlah);$i++){
            
            for($j=0; $j< count($k[0]);$j++){
                $normalisi[$i][$j] = $k[$j][$i] / $jumlah[$i]; 
            }
            
        }
        
        $jn=array();
        for($i=0;$i<count($jumlah);$i++){
            $jn[$i]=0;
            for($j=0; $j< count($k[0]);$j++){
            $jn[$i]+= $normalisi[$j][$i] ;
                // echo $normalisi[$j][$i]."aku" ;
            }
        }
        
        $bobot = array();
        for($i=0;$i<count($jumlah);$i++){
            $bobot[$i]=$jn[$i]/count($jn);
        }
            
        
        DB::table('kriteria_ahp')->where('id_kriteria','kp1')->update([
                "bobot_kriteria"=>$bobot[0],
                "Nilai_perbandingan_kriteria"=>$ke
            ]);
        DB::table('kriteria_ahp')->where('id_kriteria','kp2')->update([
            "bobot_kriteria"=>$bobot[1],
            "Nilai_perbandingan_kriteria"=>$tesw
        ]);
        DB::table('kriteria_ahp')->where('id_kriteria','kp3')->update([
            "bobot_kriteria"=>$bobot[2],
            "Nilai_perbandingan_kriteria"=>$tesc
        ]);
        Session::flash('sukses','Berhasil menghitung bobot kriteria produksi');
        return  redirect('/kriteria/produksi');
        }
        
    }


    //update non produksi kriteria
    public function updatenonproduksi(Request $request){
        $ke = $request->Kedisiplinan;
        $tulis = $request->Tes_Tulis;
        $waw=$request->Tes_wawancara;
        $psi=$request->Psikotes;
        
        if($ke==0 || $telis==0 ||$waw == 0 || $psi == 0){
            Session::flash('gagal','Gagal menghitung nonproduksi, tidak boleh ada nilai nol');
            return  redirect('/kriteria/nonproduksi');
        }else{
        $k=array(                   //k1            //k2            //k3            //4     
                                array(1,            $ke/$tulis,     $ke/$waw,      $ke/$psi),	        //K1								
                                array($tulis/$ke,    1,              $tulis/$waw,     $tulis/$psi),	//K2					                           
                                array($waw/$ke,     $waw/$tulis,       1,           $waw/$psi),	//K3
                                array($psi/$ke,     $psi/$tulis,       $psi/$waw,       1),	//K4												                            
                                     
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
        
    
        DB::table('kriteria_ahp')->where('id_kriteria','kn1')->update([
                "bobot_kriteria"=>$bobot[0],
                "Nilai_perbandingan_kriteria"=>$ke
            ]);
        DB::table('kriteria_ahp')->where('id_kriteria','kn2')->update([
            "bobot_kriteria"=>$bobot[1],
            "Nilai_perbandingan_kriteria"=>$tulis
        ]);
        DB::table('kriteria_ahp')->where('id_kriteria','kn3')->update([
            "bobot_kriteria"=>$bobot[2],
            "Nilai_perbandingan_kriteria"=>$waw
        ]);
        DB::table('kriteria_ahp')->where('id_kriteria','kn4')->update([
            "bobot_kriteria"=>$bobot[3],
            "Nilai_perbandingan_kriteria"=>$psi
        ]);
        Session::flash('sukses','Berhasil menghitung bobot kriteria non produksi');
        return  redirect('/kriteria/nonproduksi');
        
        // return $bobot[0];
        }
        }

        
        

}
