<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ControllerRangking extends Controller
{
    public function index(){
        $tglakhir = date('Y-m-d');
        $tglawal =date('Y-m-d', strtotime('-1 month', strtotime($tglakhir)));

        $sql=DB::table('calon_karyawan as c')
        ->join('nilai_kriteria_calon_karyawan as n','c.id_calon_karyawan','=','n.id_calon_karyawan')
        ->join('bobot_calon_karyawan as b', 'n.id_nilai','=','b.id_nilai')
        ->join('bagian as bb','c.id_bagian','=','bb.id_bagian')
        ->select('c.Nama_Calon_karyawan','b.nilai_bobot_calon_karyawan','bobot_akhir','rangking','nama_bagian')
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
                $kedisiplinan[$i] += $k[$j][$i];
                
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
                $tespraktik[$i] += $k[$j][$i];
                
            }
            // echo $tespraktik[$i]." ";
            
            // echo $i." ";
            // echo $k[$i][0];
            // echo "<br>";
        }
        foreach($sql as $a){
            // echo $a->Nama_Calon_karyawan. " ".$a->nilai_bobot_calon_karyawan;
        }
        return view('rangking',['sql'=>$sql,'tesw'=>$kedisiplinan,'tespraktik'=>$tespraktik]);

    }

}
