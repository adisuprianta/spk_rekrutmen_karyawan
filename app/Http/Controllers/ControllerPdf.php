<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class ControllerPdf extends Controller
{
    public function cetak_pdf(Request $request){
        $tglakhir =$request->tgl_akhir;
        $tglawal =$request->tgl_awal;
        // $tgl=array($tglawal,$tglakhir);
        $nama = $request->nama;
        if($nama=='Produksi'){
        
            
            $sql=DB::table('calon_karyawan as c')
            ->join('nilai_kriteria_calon_karyawan as n','c.id_calon_karyawan','=','n.id_calon_karyawan')
            ->join('bobot_calon_karyawan as b', 'n.id_nilai','=','b.id_nilai')
            ->join('bagian as bb','c.id_bagian','=','bb.id_bagian')
            ->select('c.Nama_Calon_karyawan','b.nilai_bobot_calon_karyawan','bobot_akhir','rangking','nama_bagian','nilai_kriteria')
            ->join('rangking as r','c.id_calon_karyawan','=','r.id_calon_karyawan')
            ->where('c.id_bagian','bg0')
            ->whereBetween('c.tanggal_daftar',array($tglawal,$tglakhir))
            // ->groupBy('c.Nama_calon_karyawan','b.nilai_bobot_calon_karyawan','bobot_akhir','rangking','nama_bagian' )
            ->get();

            
            // $q =DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->get(); 
            // ->join('bagian as bb','c.id_bagian','=','bb.id_bagian')
            // ->join('kriteria_ahp as k','c.id_bagian','=','k.id_bagian')
            // ->join('sub_kriteria_ahp as s','k.id_kriteria','=','s.id_kriteria')
            // ->join('nilai_sub_calon_karyawan_saw as nnn','s.id_sub_kriteria','=','nnn.id_sub_kriteria')

            
            // ->groupBy('c.id_calon_karyawan')
            $bagian = array();
            $bagian[0] = 'Produksi';
            $kosong = 1;
            if(count($sql) ==0){
                // return  redirect('/home');
                $kosong = 0;
                return view('rangking',['a'=>$bagian,'kosong'=>$kosong]);
            }else{
                $k = array();
                for($i=0;$i<4;$i++){
                $a=$i+1;
                $tw=DB::table('calon_karyawan as c')
                ->join('nilai_sub_calon_karyawan_saw as nn','c.id_calon_karyawan','=','nn.id_calon_karyawan')
                ->join('bobot_sub_calon_karyawan as bbb', 'nn.id_nilai_sub_kriteria','=','bbb.id_nilai_sub_kriteria')
                ->select('nilai_bobot_sub_kriteria as s','c.id_calon_karyawan')
                ->where('nn.id_sub_kriteria','tw'.$a)
                ->where('c.id_bagian','bg0')
                ->whereBetween('c.tanggal_daftar',array($tglawal,$tglakhir))
                ->get();
                $j=0;
                foreach($tw as $a){
                    $k[$i][$j] =$a->s; 
                    // echo $a->id_calon_karyawan." ".$k[$i][$j]." ";
                    $j++;
                }
                // echo "<br>";
                }
                // echo "<br>";
                $kedisiplinan =array();
                for($i=0;$i<count($k[0]);$i++){
                    $kedisiplinan[$i] = 0;
                    for($j=0;$j<count($k);$j++){ 
                        $kedisiplinan[$i] += $k[$j][$i]*100;
                        
                    }
                    // echo $kedisiplinan[$i]." ";
                    
                    // echo $i." ";
                    // echo $k[$i][0];
                    // echo "<br>";
                }


                $k=array();
                for($i=0;$i<4;$i++){
                    $a=$i+1;
                    $tw=DB::table('calon_karyawan as c')
                    ->join('nilai_sub_calon_karyawan_saw as nn','c.id_calon_karyawan','=','nn.id_calon_karyawan')
                    ->join('bobot_sub_calon_karyawan as bbb', 'nn.id_nilai_sub_kriteria','=','bbb.id_nilai_sub_kriteria')
                    ->select('nilai_bobot_sub_kriteria as s','c.id_calon_karyawan')
                    ->where('nn.id_sub_kriteria','tp'.$a)
                    ->where('c.id_bagian','bg0')
                    ->whereBetween('c.tanggal_daftar',array($tglawal,$tglakhir))
                    ->get();
                    $j=0;
                    foreach($tw as $a){
                        $k[$i][$j] =$a->s; 
                        // echo $a->id_calon_karyawan." ".$k[$i][$j]." ";
                        $j++;
                    }
                    // echo "<br>";
                }

                $tespraktik =array();
                for($i=0;$i<count($k[0]);$i++){
                    $tespraktik[$i] = 0;
                    for($j=0;$j<count($k);$j++){ 
                        $tespraktik[$i] += $k[$j][$i]*100;
                        
                    }
                    // echo $tespraktik[$i]." ";
                    
                    // echo $i." ";
                    // echo $k[$i][0];
                    // echo "<br>";
                }
                // foreach($sql as $a){
                //     echo $a->Nama_Calon_karyawan. " ".$a->nilai_bobot_calon_karyawan;
                //     // return  redirect('/home');
                // }
                $pdf = PDF::loadview('rangking_pdf',['sql'=>$sql,'tesw'=>$kedisiplinan,'tespraktik'=>$tespraktik,'a'=>$bagian,'kosong'=>$kosong]);
                return $pdf->download('laporan-rangking-pdf');
                // return view('rangking_pdf',['sql'=>$sql,'tesw'=>$kedisiplinan,'tespraktik'=>$tespraktik,'a'=>$bagian,'kosong'=>$kosong]);
            }
            
        }else{
            $sql=DB::table('calon_karyawan as c')
            ->join('nilai_kriteria_calon_karyawan as n','c.id_calon_karyawan','=','n.id_calon_karyawan')
            ->join('bobot_calon_karyawan as b', 'n.id_nilai','=','b.id_nilai')
            ->join('bagian as bb','c.id_bagian','=','bb.id_bagian')
            ->select('c.Nama_Calon_karyawan','b.nilai_bobot_calon_karyawan','bobot_akhir','rangking','nama_bagian','n.id_kriteria','nilai_kriteria')
            ->join('rangking as r','c.id_calon_karyawan','=','r.id_calon_karyawan')
            ->where('c.id_bagian','bg1')
            ->where('n.id_kriteria','kn1')
            ->whereBetween('c.tanggal_daftar',array($tglawal,$tglakhir))
            // ->groupBy('c.Nama_calon_karyawan','b.nilai_bobot_calon_karyawan','bobot_akhir','rangking','nama_bagian' )
            ->get();
            $te=DB::table('calon_karyawan as c')
            ->join('nilai_kriteria_calon_karyawan as n','c.id_calon_karyawan','=','n.id_calon_karyawan')
            ->join('bobot_calon_karyawan as b', 'n.id_nilai','=','b.id_nilai')
            ->join('bagian as bb','c.id_bagian','=','bb.id_bagian')
            ->select('c.Nama_Calon_karyawan','b.nilai_bobot_calon_karyawan','bobot_akhir','rangking','nama_bagian','n.id_kriteria','nilai_kriteria')
            ->join('rangking as r','c.id_calon_karyawan','=','r.id_calon_karyawan')
            ->where('c.id_bagian','bg1')
            ->where('n.id_kriteria','kn2')
            ->whereBetween('c.tanggal_daftar',array($tglawal,$tglakhir))
            // ->groupBy('c.Nama_calon_karyawan','b.nilai_bobot_calon_karyawan','bobot_akhir','rangking','nama_bagian' )
            ->get();
            
            $bagian = array();
            $bagian[0] = 'NonProduksi';
            $kosong = 1;
            if(count($sql) == 0){
                // echo 'aa';
                $kosong = 0;
                return view('rangking',['sql'=>$sql,'a'=>$bagian,'kosong'=>$kosong]);
            }else{
                

                $testulis = array();
                $l=0;
                foreach($te as $a){
                    $testulis[$l]= $a->nilai_kriteria;
                    $l++;
                }

                $k = array();
                for($i=0;$i<4;$i++){
                $a=$i+1;
                $tw=DB::table('calon_karyawan as c')
                ->join('nilai_sub_calon_karyawan_saw as nn','c.id_calon_karyawan','=','nn.id_calon_karyawan')
                ->join('bobot_sub_calon_karyawan as bbb', 'nn.id_nilai_sub_kriteria','=','bbb.id_nilai_sub_kriteria')
                ->select('nilai_bobot_sub_kriteria as s','c.id_calon_karyawan')
                ->where('nn.id_sub_kriteria','nw'.$a)
                ->where('c.id_bagian','bg1')
                ->whereBetween('c.tanggal_daftar',array($tglawal,$tglakhir))
                ->get();
                $j=0;
                foreach($tw as $a){
                    $k[$i][$j] =$a->s; 
                    // echo $a->id_calon_karyawan." ".$k[$i][$j]." ";
                    $j++;
                }
                // echo "<br>";
                }
                // echo "<br>";
                $teswawancara =array();
                for($i=0;$i<count($k[0]);$i++){
                    $teswawancara[$i] = 0;
                    for($j=0;$j<count($k);$j++){ 
                        $teswawancara[$i] += $k[$j][$i]*100;
                        
                    }
                    // echo $teswawancara[$i]." ";
                    
                    // echo $i." ";
                    // echo $k[$i][0];
                    // echo "<br>";
                }
                $k=array();
                for($i=0;$i<4;$i++){
                    $a=$i+1;
                    $tw=DB::table('calon_karyawan as c')
                    ->join('nilai_sub_calon_karyawan_saw as nn','c.id_calon_karyawan','=','nn.id_calon_karyawan')
                    ->join('bobot_sub_calon_karyawan as bbb', 'nn.id_nilai_sub_kriteria','=','bbb.id_nilai_sub_kriteria')
                    ->select('nilai_bobot_sub_kriteria as s','c.id_calon_karyawan')
                    ->where('nn.id_sub_kriteria','ps'.$a)
                    ->where('c.id_bagian','bg1')
                    ->whereBetween('c.tanggal_daftar',array($tglawal,$tglakhir))
                    ->get();
                    $j=0;
                    foreach($tw as $a){
                        $k[$i][$j] =$a->s; 
                        // echo $a->id_calon_karyawan." ".$k[$i][$j]." ";
                        $j++;
                    }
                    // echo "<br>";
                }

                $psikotes =array();
                for($i=0;$i<count($k[0]);$i++){
                    $psikotes[$i] = 0;
                    for($j=0;$j<count($k);$j++){ 
                        $psikotes[$i] += $k[$j][$i]*100;
                        // echo $psikotes[$i]." ";
                    }
                    
                    
                    // echo $i." ";
                    // echo $k[$i][0];
                    // echo "<br>";
                }
                $pdf = PDF::loadview('rangking_pdf',['sql'=>$sql,'tesw'=>$teswawancara,'test'=>$testulis,'psikotes'=>$psikotes,'a'=>$bagian,'kosong'=>$kosong]);
                return $pdf->download('laporan-rangking-pdf');
                // return view('rangking',['sql'=>$sql,'tesw'=>$teswawancara,'test'=>$testulis,'psikotes'=>$psikotes,'a'=>$bagian,'kosong'=>$kosong]);
            }
            
        }
    }
}
