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




            // return "Hello nonproduksi";
        }
        // return $request->id_karyawan." ".$request->id_bagian;
        return redirect('home/produksi');
    }





    public function hitungsaw(Request $request){
        $tglawal = $request->tgl_awal;
        $tglakhir = $request->tgl_akhir;
        $id_bagian = $request->id_bagian;
        $con = new ControllerSaw();
        if($id_bagian == "bg0"){
            $bobot_teswp = $con->getteswawancaraproduksi($tglawal,$tglakhir);
            $bobot_tesprak = $con->gettespraktik($tglawal,$tglakhir);
            $nilai_kedisiplinan = $con->getkedisiplinanprok($tglawal,$tglakhir);
            $id = array();
            // echo "<br>";
            $saw = array();
            for($j=0;$j<count($bobot_teswp);$j++){
                $saw[0][$j] = $bobot_teswp[$j];
                // echo $saw[0][$j]." _ ";
            } 
            // echo " <br>";
            for($j=0;$j<count($bobot_tesprak);$j++){
                $saw[1][$j] = $bobot_tesprak[$j];
                // echo $saw[1][$j]." _ ";
            }
            // echo " <br>";
            for($j=0;$j<count($nilai_kedisiplinan);$j++){
                $saw[2][$j] = $nilai_kedisiplinan[$j][0];
                $id[$j] =  $nilai_kedisiplinan[$j][1];
                // echo $saw[2][$j]." _ ".$id[$j]." __ ";
            }
            // echo " <br>";
            // echo " <br>";
            $nilaimax_min = array();
            for($i=0; $i<count($saw); $i++){
                $nilaimax_min[$i] =max($saw[$i]);
                // echo $nilaimax_min[$i]."<br>"; 
                
            }

            $normalisasi = array();
            for($i=0; $i<count($saw); $i++){
                for($j=0;$j<count($saw[0]); $j++){
                    
                    $normalisasi[$i][$j] = $saw[$i][$j]/ $nilaimax_min[$i];
                    // echo $normalisasi[$i][$j]." _ ";
                    
                }
                // echo "<br>";
            }

            $bobot = array();
            $bob = DB::table('kriteria_ahp')->where('id_bagian','bg0')->get();
            $i=0;
            foreach($bob as $a){
                $bobot[$i] = $a->bobot_kriteria;
                $i++;
            }

            $nilai_bobot = array();

            // echo "<br>";echo "<br>";
            for($i=0; $i<count($saw); $i++){
                for($j=0;$j<count($saw[0]); $j++){
                    $nilai_bobot[$i][$j] = $normalisasi[$i][$j]*$bobot[$i] ;
                    if($i==2){
                        $cek = DB::table('bobot_calon_karyawan')->where('id_nilai',$id[$j])->get();
                        if(count($cek) >0){
                            DB::table('bobot_calon_karyawan')->where('id_nilai',$id[$j])->update([
                                'nilai_bobot_calon_karyawan'=>$nilai_bobot[$i][$j]
                            ]);
                            // echo "update ";
                        }else{
                            // echo "input ";
                            
                            DB::table('bobot_calon_karyawan')->insert([
                                'id_nilai'=>$id[$j],
                                'nilai_bobot_calon_karyawan'=>$nilai_bobot[$i][$j]
                            ]);
                        }
                        // echo $nilai_bobot[$i][$j]." _ ";
                    }
                    
                }
                // echo "<br>";
            }
            $jumlah_bobot = array();
            for($i=0; $i<count($saw[0]); $i++){
                $jumlah_bobot[$i] = 0;
                for($j=0;$j<count($saw); $j++){
                    $jumlah_bobot[$i] += number_format($nilai_bobot[$j][$i],4);                
                }
                // echo $jumlah_bobot[$i]." ";
                // echo "<br>";
            }
            $urutkanbobot = array();
            $id = DB::table('calon_karyawan')->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))
            ->where('id_bagian','bg0')->where('approve','1')->get();
            $i=0;




    // rangking
            foreach($id as $id_c){
                $urutkanbobot[$i][0]=$id_c->id_calon_karyawan;
                $urutkanbobot[$i][1] = number_format($jumlah_bobot[$i],4);
                    
                // echo $urutkanbobot[$i][0]." ";
                // echo $urutkanbobot[$i][1]." ";
                // echo "<br>";
                $i++;
            }


            
            rsort($jumlah_bobot,SORT_NUMERIC);
            $urt=array();
            for($i=0; $i<count($saw[0]); $i++){
                $urt[$i] = number_format($jumlah_bobot[$i],4);
                
                // echo $urt[$i]." ";
                // echo "<br>";
            }
            

            // echo "<br>";
            // echo "<br>";
            for($i=0; $i<count($saw[0]); $i++){
                
                for($j=0;$j<count($saw[0]); $j++){
                    if($urutkanbobot[$i][1]==$urt[$j]){
                        $urutkanbobot[$i][2] = $j+1;
                        // echo $urutkanbobot[$i][2]." ";
                    }
                }
                
                // echo "<br>";
            }
            
            for($i=0; $i<count($saw[0]); $i++){
                $a = DB::table('rangking')->where('id_calon_karyawan',$urutkanbobot[$i][0])->get();
                if(count($a)==1){
                    DB::table("rangking")->where('id_calon_karyawan',$urutkanbobot[$i][0])->update([
                        'bobot_akhir'=>$urutkanbobot[$i][1],
                        'rangking'=>$urutkanbobot[$i][2]
                    ]);
                    // echo $urutkanbobot[$i][0]." _ ";
                    // echo $urutkanbobot[$i][1]." _ ";
                    // echo $urutkanbobot[$i][2]." _ "; 
                }else{
                    DB::table("rangking")->insert([
                        'id_calon_karyawan'=>$urutkanbobot[$i][0],
                        'bobot_akhir'=>$urutkanbobot[$i][1],
                        'rangking'=>$urutkanbobot[$i][2]
                       ]);
                    // echo"tidak";
                }
                
                // echo "<br>";

            }
            $tangal = array($tglawal,$tglakhir);

            $bagian=DB::table('bagian')->where('id_bagian',$id_bagian)->get();
            foreach($bagian as $p){
                $calon=DB::table('calon_karyawan')->where('id_bagian',$p->id_bagian)
                ->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))
                ->get();
            }
            return view("karyawan",['bagian' => $bagian, 'calon'=>$calon,'tgl'=>$tangal]);
        }else{
            $bobot_teswan = $con->getteswawancaranon($tglawal,$tglakhir);
            $bobot_psikotes = $con->getpsikotes($tglawal,$tglakhir);
            $nilai_kedisiplinannon = $con->kedisipinannon($tglawal,$tglakhir);
            $nilai_testulis = $con->testulis($tglawal,$tglakhir);
            $id_tu = array();
            $id_ked = array();
            // echo "<br>";
            $saw = array();
            for($j=0;$j<count($bobot_teswan);$j++){
                $saw[0][$j] = $bobot_teswan[$j];
                // echo $saw[0][$j]." _ ";
            } 
            // echo " <br>";
            for($j=0;$j<count($bobot_psikotes);$j++){
                $saw[1][$j] = $bobot_psikotes[$j];
                // echo $saw[1][$j]." _ ";
            }
            // echo " <br>";
            for($j=0;$j<count($nilai_kedisiplinannon);$j++){
                $saw[2][$j] = $nilai_kedisiplinannon[$j][0];
                $id_ked[$j] =  $nilai_kedisiplinannon[$j][1];
                // echo $saw[2][$j]." _ ".$id_ked[$j]." __ ";
            }
            // echo "<br>";
            for($j=0;$j<count($nilai_testulis);$j++){
                $saw[3][$j] = $nilai_testulis[$j][0];
                $id_tu[$j] =  $nilai_testulis[$j][1];
                // echo $saw[3][$j]." _ ".$id_tu[$j]." __ ";
            }
            // echo "<br>";
            $nilaimax_min = array();
            for($i=0; $i<count($saw); $i++){
                $nilaimax_min[$i] =max($saw[$i]);
                // echo $nilaimax_min[$i]."<br>"; 
                
            }


            $normalisasi = array();
            for($i=0; $i<count($saw); $i++){
                for($j=0;$j<count($saw[0]); $j++){
                    
                    $normalisasi[$i][$j] = $saw[$i][$j]/ $nilaimax_min[$i];
                    // echo $normalisasi[$i][$j]." _ ";
                    
                }
                // echo "<br>";
            }

            $bobot = array();
            $bob = DB::table('kriteria_ahp')->where('id_bagian','bg1')->get();
            $i=0;
            foreach($bob as $a){
                $bobot[$i] = $a->bobot_kriteria;
                // echo $bobot[$i]."  ";
                $i++;
            }

            $nilai_bobot = array();

            // echo "<br>";echo "<br>";
            for($i=0; $i<count($saw); $i++){
                for($j=0;$j<count($saw[0]); $j++){
                    $nilai_bobot[$i][$j] = $normalisasi[$i][$j]*$bobot[$i] ;
                    if($i==2){
                        $cek = DB::table('bobot_calon_karyawan')->where('id_nilai',$id_tu[$j])->get();
                        if(count($cek) >0){
                            DB::table('bobot_calon_karyawan')->where('id_nilai',$id_tu[$j])->update([
                                'nilai_bobot_calon_karyawan'=>$nilai_bobot[$i][$j]
                            ]);
                            // echo "update ";
                        }else{
                            // echo $nilai_bobot[$i][$j]." ";
                            
                            DB::table('bobot_calon_karyawan')->insert([
                                'id_nilai'=>$id_tu[$j],
                                'nilai_bobot_calon_karyawan'=>$nilai_bobot[$i][$j]
                            ]);
                            
                        }
                        // echo $nilai_bobot[$i][$j]." _ ";
                    }else if($i==3){
                        echo "<br>";
                        $cekk = DB::table('bobot_calon_karyawan')->where('id_nilai',$id_ked[$j])->get();
                        if(count($cekk)>0){
                            DB::table('bobot_calon_karyawan')->where('id_nilai',$id_ked[$j])->update([
                                'nilai_bobot_calon_karyawan'=>$nilai_bobot[$i][$j]
                            ]);
                            // echo "update ";
                        }else{
                            // echo $nilai_bobot[$i][$j]." ";
                            
                            DB::table('bobot_calon_karyawan')->insert([
                                'id_nilai'=>$id_ked[$j],
                                'nilai_bobot_calon_karyawan'=>$nilai_bobot[$i][$j]
                            ]);
                        }
                    }
                    
                }
                // echo "<br>";
            }

            $jumlah_bobot = array();
            for($i=0; $i<count($saw[0]); $i++){
                $jumlah_bobot[$i] = 0;
                for($j=0;$j<count($saw); $j++){
                    $jumlah_bobot[$i] += number_format($nilai_bobot[$j][$i],4);                
                }
                // echo $jumlah_bobot[$i]." ";
                // echo "<br>";
            }
            $urutkanbobot = array();
            $id = DB::table('calon_karyawan')->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))
            ->where('id_bagian','bg1')->get();
            $i=0;




    // rangking
            foreach($id as $id_c){
                $urutkanbobot[$i][0]=$id_c->id_calon_karyawan;
                $urutkanbobot[$i][1] = number_format($jumlah_bobot[$i],4);
                    
                // echo $urutkanbobot[$i][0]." ";
                // echo $urutkanbobot[$i][1]." ";
                // echo "<br>";
                $i++;
            }


            
            rsort($jumlah_bobot,SORT_NUMERIC);
            $urt=array();
            for($i=0; $i<count($saw[0]); $i++){
                $urt[$i] = number_format($jumlah_bobot[$i],4);
                
                // echo $urt[$i]." ";
                // echo "<br>";
            }
            

            // echo "<br>";
            // echo "<br>";
            for($i=0; $i<count($saw[0]); $i++){
                
                for($j=0;$j<count($saw[0]); $j++){
                    if($urutkanbobot[$i][1]==$urt[$j]){
                        $urutkanbobot[$i][2] = $j+1;
                        // echo $urutkanbobot[$i][2]." ";
                    }
                }
                
                // echo "<br>";
            }
            
            for($i=0; $i<count($saw[0]); $i++){
                $a = DB::table('rangking')->where('id_calon_karyawan',$urutkanbobot[$i][0])->get();
                if(count($a)==1){
                    DB::table("rangking")->where('id_calon_karyawan',$urutkanbobot[$i][0])->update([
                        'bobot_akhir'=>$urutkanbobot[$i][1],
                        'rangking'=>$urutkanbobot[$i][2]
                    ]);
                    // // echo $urutkanbobot[$i][0]." _ ";
                    // echo $urutkanbobot[$i][1]." _ ";
                    // echo $urutkanbobot[$i][2]." _ "; 
                }else{
                    DB::table("rangking")->insert([
                        'id_calon_karyawan'=>$urutkanbobot[$i][0],
                        'bobot_akhir'=>$urutkanbobot[$i][1],
                        'rangking'=>$urutkanbobot[$i][2]
                       ]);
                    // echo"tidak";
                }
                
                // echo "<br>";

            }
            $tangal = array($tglawal,$tglakhir);
            
            $bagian=DB::table('bagian')->where('id_bagian',$id_bagian)->get();
            foreach($bagian as $p){
                $calon=DB::table('calon_karyawan')->where('id_bagian',$p->id_bagian)
                ->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))
                ->get();
            }
            return view("karyawan",['bagian' => $bagian, 'calon'=>$calon,'tgl'=>$tangal]);
        }
     
    }
    public function testulis($awal,$akhir){
        $k = DB::table('calon_karyawan')->join('nilai_kriteria_calon_karyawan','calon_karyawan.id_calon_karyawan','=',
            'nilai_kriteria_calon_karyawan.id_calon_karyawan')
            ->select('calon_karyawan.id_calon_karyawan','nilai_kriteria','id_nilai','approve')
            ->whereBetween('tanggal_daftar',array($awal,$akhir))
            ->where('id_bagian','bg1')->where('id_kriteria','kn2')->where('approve','1')->get();
            $i = 0;
            foreach($k as $a){
                if($a->approve==1){
                    $nilai_kedisiplinan[$i][0] = $a->nilai_kriteria;
                    $nilai_kedisiplinan[$i][1] = $a->id_nilai;
                    // echo $nilai_kedisiplinan[$i][0];
                    // echo $i;
                    $i++;
                    
                }
                
            }
            return $nilai_kedisiplinan;
    }

    public function kedisipinannon($awal,$akhir){
        $k = DB::table('calon_karyawan')->join('nilai_kriteria_calon_karyawan','calon_karyawan.id_calon_karyawan','=',
            'nilai_kriteria_calon_karyawan.id_calon_karyawan')
            ->select('calon_karyawan.id_calon_karyawan','nilai_kriteria','id_nilai','approve')
            ->whereBetween('tanggal_daftar',array($awal,$akhir))
            ->where('id_bagian','bg1')->where('id_kriteria','kn1')->where('approve','1')->get();
        $nilai_kedisiplinan = array();
        
        $i = 0;
            foreach($k as $a){
                if($a->approve==1){
                    $nilai_kedisiplinan[$i][0] = $a->nilai_kriteria;
                    $nilai_kedisiplinan[$i][1] = $a->id_nilai;
                    // echo $nilai_kedisiplinan[$i][0];
                    // echo $nilai_kedisiplinan[$i][1];
                    // echo $i;
                    $i++;
                    
                }
                
            }
            return $nilai_kedisiplinan;
    }
    public function getpsikotes($awal,$akhir){
        $saw = array();
        $id = array();
        // teswawancara 
        for($i=0;$i<=3;$i++){
            $q =1+$i;
            $k = DB::table('calon_karyawan')->join('nilai_sub_calon_karyawan_saw','calon_karyawan.id_calon_karyawan','=',
            'nilai_sub_calon_karyawan_saw.id_calon_karyawan')
            ->select('calon_karyawan.id_calon_karyawan','nilai_sub_kriteria','id_nilai_sub_kriteria','approve')
            ->whereBetween('tanggal_daftar',array($awal,$akhir))
            ->where('id_bagian','bg1')->where('id_sub_kriteria','Ps'.$q)->where('approve','1')->get();
            $j = 0;
            foreach($k  as $a){
                if($a->approve ==1){
                $saw[$i][$j]=$a->nilai_sub_kriteria;
                $id[$i][$j] = $a->id_nilai_sub_kriteria;
                // echo $id[$i][$j]." ";
                // echo $saw[$i][$j]." ";
                $j++;
                }
            }
            // echo " <br>";
        }
        $nilaimax_min = array();

        // echo count( $saw);
        // echo max($saw[0])."<br>";
        
        for($i=0; $i<count($saw); $i++){
            $nilaimax_min[$i] =max($saw[$i]);
            // echo $nilaimax_min[$i]."<br>"; 
            
        }

        $normalisasi = array();
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                
                $normalisasi[$i][$j] = $saw[$i][$j]/ $nilaimax_min[$i];
                // echo $normalisasi[$i][$j]." _ ";
                
            }
            // echo "<br>";
        }

        // bobot
        $bobot = array();
        $bob = DB::table('sub_kriteria_ahp')->where('id_kriteria','kn3')->get();
        $i=0;
        foreach($bob as $a){
            $bobot[$i] = $a->bobot_sub_kriteria;
            $i++;
        }

        $nilai_bobot = array();
        // echo " <br>";echo " <br>";echo " <br>";
        // ini masuk database
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                $nilai_bobot[$i][$j] = $normalisasi[$i][$j]*$bobot[$i] ;
                    // echo $nilai_bobot[$i][$j]." _ ".$id[$i][$j]."__";
                    
                    $cek = DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->get();
                    if(count($cek) >0){
                        DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->update([
                            'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                        ]);
                    }else{
                        // echo $id[$i][$j]." ";
                        
                        DB::table('bobot_sub_calon_karyawan')->insert([
                            'id_nilai_sub_kriteria'=>$id[$i][$j],
                            'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                        ]);
                    }
                    // echo count($cek);
            }
            // echo "<br>";
        }
        // // echo " <br>";echo " <br>";
        


        // // echo "<br>";
        // // echo "<br>";
        $jumlah_bobot = array();
        for($i=0; $i<count($saw[0]); $i++){
            $jumlah_bobot[$i] = 0;
            for($j=0;$j<count($saw); $j++){
                $jumlah_bobot[$i] += number_format($nilai_bobot[$j][$i] * 100,2);
            }
            // echo $jumlah_bobot[$i]." ";
            // echo "<br>";
        }
        return $jumlah_bobot;
    }


    public function getteswawancaranon($awal,$akhir){
        $saw = array();
        $id = array();
        // teswawancara 
        for($i=0;$i<=3;$i++){
            $q =1+$i;
            $k = DB::table('calon_karyawan')->join('nilai_sub_calon_karyawan_saw','calon_karyawan.id_calon_karyawan','=',
            'nilai_sub_calon_karyawan_saw.id_calon_karyawan')
            ->select('calon_karyawan.id_calon_karyawan','nilai_sub_kriteria','id_nilai_sub_kriteria','approve')
            ->whereBetween('tanggal_daftar',array($awal,$akhir))
            ->where('id_bagian','bg1')->where('id_sub_kriteria','Nw'.$q)->where('approve','1')->get();
            $j = 0;
            foreach($k  as $a){
                if($a->approve ==1){
                $saw[$i][$j]=$a->nilai_sub_kriteria;
                $id[$i][$j] = $a->id_nilai_sub_kriteria;
                // echo $id[$i][$j]." ";
                // echo $saw[$i][$j]." ";
                $j++;
                }
            }
            // echo " <br>";
        }
        $nilaimax_min = array();

        // echo count( $saw);
        // echo max($saw[0])."<br>";
        
        for($i=0; $i<count($saw); $i++){
            $nilaimax_min[$i] =max($saw[$i]);
            // echo $nilaimax_min[$i]."<br>"; 
        }

        $normalisasi = array();
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                
                $normalisasi[$i][$j] = $saw[$i][$j]/ $nilaimax_min[$i];
                // echo $normalisasi[$i][$j]." _ ";
                
            }
            // echo "<br>";
        }

        // bobot
        $bobot = array();
        $bob = DB::table('sub_kriteria_ahp')->where('id_kriteria','kn3')->get();
        $i=0;
        foreach($bob as $a){
            $bobot[$i] = $a->bobot_sub_kriteria;
            $i++;
        }

        $nilai_bobot = array();
        // echo " <br>";echo " <br>";echo " <br>";
        // ini masuk database
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                $nilai_bobot[$i][$j] = $normalisasi[$i][$j]*$bobot[$i] ;
                    // echo $nilai_bobot[$i][$j]." _ ".$id[$i][$j]."__";
                    
                    $cek = DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->get();
                    if(count($cek) >0){
                        DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->update([
                            'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                        ]);
                    }else{
                        // echo $id[$i][$j]." ";
                        
                        DB::table('bobot_sub_calon_karyawan')->insert([
                            'id_nilai_sub_kriteria'=>$id[$i][$j],
                            'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                        ]);
                    }
                    // echo count($cek);
            }
            // echo "<br>";
        }
        // // echo " <br>";echo " <br>";
        


        // // echo "<br>";
        // // echo "<br>";
        $jumlah_bobot = array();
        for($i=0; $i<count($saw[0]); $i++){
            $jumlah_bobot[$i] = 0;
            for($j=0;$j<count($saw); $j++){
                $jumlah_bobot[$i] += number_format($nilai_bobot[$j][$i] * 100,4);
                    
                
            }
            // echo $jumlah_bobot[$i]." ";
            // echo "<br>";
        }
        return $jumlah_bobot;
    }



    public function getkedisiplinanprok($awal,$akhir){
        $k = DB::table('calon_karyawan')->join('nilai_kriteria_calon_karyawan','calon_karyawan.id_calon_karyawan','=',
            'nilai_kriteria_calon_karyawan.id_calon_karyawan')
            ->select('calon_karyawan.id_calon_karyawan','nilai_kriteria','id_nilai','approve')
            ->whereBetween('tanggal_daftar',array($awal,$akhir))
            ->where('id_bagian','bg0')->where('id_kriteria','kp1')->where('approve','1')->get();
        $nilai_kedisiplinan = array();
        
        $i = 0;
            foreach($k as $a){
                if($a->approve==1){
                    $nilai_kedisiplinan[$i][0] = $a->nilai_kriteria;
                    $nilai_kedisiplinan[$i][1] = $a->id_nilai;
                    // echo $nilai_kedisiplinan[$i][1];
                    // echo $i;
                    $i++;
                    
                }
                
            }
            return $nilai_kedisiplinan;
    }

    public function gettespraktik($tglawal,$tglakhir){
        $saw = array();
        $id = array();
        // tespraktek 
        for($i=0;$i<=3;$i++){
            $q =1+$i;
            $k = DB::table('calon_karyawan')->join('nilai_sub_calon_karyawan_saw','calon_karyawan.id_calon_karyawan','=',
            'nilai_sub_calon_karyawan_saw.id_calon_karyawan')
            ->select('calon_karyawan.id_calon_karyawan','nilai_sub_kriteria','id_nilai_sub_kriteria','approve')
            ->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))
            ->where('id_bagian','bg0')->where('id_sub_kriteria','Tp'.$q)->where('approve','1')->get();
            $j = 0;
            foreach($k  as $a){
                if($a->approve==1){
                    $saw[$i][$j]=$a->nilai_sub_kriteria;
                    $id[$i][$j]=$a->id_nilai_sub_kriteria;
                    // echo $a->id_calon_karyawan." ";
                    $j++;
                }
                
            }
            // echo " <br>";
        }
        $nilaimax_min = array();
        for($i=0; $i<count($saw); $i++){
            $nilaimax_min[$i] =max($saw[$i]);
            // echo $nilaimax_min[$i]."<br>"; 
            
        }
        $normalisasi = array();
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                
                $normalisasi[$i][$j] = $saw[$i][$j]/ $nilaimax_min[$i];
                // echo $normalisasi[$i][$j]." _ ";
                
            }
            // echo "<br>";
        }
        $bobot = array();
        $bob = DB::table('sub_kriteria_ahp')->where('id_kriteria','kp2')->get();
        $i=0;
        foreach($bob as $a){
            $bobot[$i] = $a->bobot_sub_kriteria;
            $i++;
        }
        
        // masuk database
        $nilai_bobot = array();

        // echo "<br>";echo "<br>";
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                $nilai_bobot[$i][$j] = $normalisasi[$i][$j]*$bobot[$i] ;
                    // echo $nilai_bobot[$i][$j]." _ ";
                $cek = DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->get();
                if(count($cek) >0){
                    DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->update([
                        'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                    ]);
                    // echo "update ";
                }else{
                    // echo "input ";
                    
                    DB::table('bobot_sub_calon_karyawan')->insert([
                        'id_nilai_sub_kriteria'=>$id[$i][$j],
                        'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                    ]);
                }
            }
            // echo "<br>";
        }
        $jumlah_bobot = array();
        for($i=0; $i<count($saw[0]); $i++){
            $jumlah_bobot[$i] = 0;
            for($j=0;$j<count($saw); $j++){
                $jumlah_bobot[$i] += number_format($nilai_bobot[$j][$i] * 100,2);                
            }
            // echo $jumlah_bobot[$i]." ";
            // echo "<br>";
        }
        return $jumlah_bobot;
    }

    public function getteswawancaraproduksi($tglawal,$tglakhir){
        $saw = array();
        $id = array();
        // teswawancara 
        for($i=0;$i<=3;$i++){
            $q =1+$i;
            $k = DB::table('calon_karyawan')->join('nilai_sub_calon_karyawan_saw','calon_karyawan.id_calon_karyawan','=',
            'nilai_sub_calon_karyawan_saw.id_calon_karyawan')
            ->select('calon_karyawan.id_calon_karyawan','nilai_sub_kriteria','id_nilai_sub_kriteria','approve')
            ->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))
            ->where('id_bagian','bg0')->where('id_sub_kriteria','Tw'.$q)->where('approve','1')->get();
            $j = 0;
            foreach($k  as $a){
                if($a->approve ==1){
                $saw[$i][$j]=$a->nilai_sub_kriteria;
                $id[$i][$j] = $a->id_nilai_sub_kriteria;
                // echo $id[$i][$j]." ";
                $j++;
                }
            }
            // echo " <br>";
        }
        $nilaimax_min = array();

        // echo count( $saw);
        // echo max($saw[0])."<br>";
        
        for($i=0; $i<count($saw); $i++){
            $nilaimax_min[$i] =max($saw[$i]);
            // echo $nilaimax_min[$i]."<br>"; 
            
        }

        $normalisasi = array();
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                
                $normalisasi[$i][$j] = $saw[$i][$j]/ $nilaimax_min[$i];
                // echo $normalisasi[$i][$j]." _ ";
                
            }
            // echo "<br>";
        }

        // bobot
        $bobot = array();
        $bob = DB::table('sub_kriteria_ahp')->where('id_kriteria','kp3')->get();
        $i=0;
        foreach($bob as $a){
            $bobot[$i] = $a->bobot_sub_kriteria;
            $i++;
        }

        $nilai_bobot = array();
        // echo " <br>";echo " <br>";echo " <br>";
        // ini masuk database
        for($i=0; $i<count($saw); $i++){
            for($j=0;$j<count($saw[0]); $j++){
                $nilai_bobot[$i][$j] = $normalisasi[$i][$j]*$bobot[$i] ;
                    // echo $nilai_bobot[$i][$j]." _ ".$id[$i][$j]."__";
                    
                    $cek = DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->get();
                    if(count($cek) >0){
                        DB::table('bobot_sub_calon_karyawan')->where('id_nilai_sub_kriteria',$id[$i][$j])->update([
                            'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                        ]);
                    }else{
                        // echo "input";
                        
                        DB::table('bobot_sub_calon_karyawan')->insert([
                            'id_nilai_sub_kriteria'=>$id[$i][$j],
                            'nilai_bobot_sub_kriteria'=>$nilai_bobot[$i][$j]
                        ]);
                    }
                    // echo count($cek);
            }
            // echo "<br>";
        }
        // echo " <br>";echo " <br>";
        


        // echo "<br>";
        // echo "<br>";
        $jumlah_bobot = array();
        for($i=0; $i<count($saw[0]); $i++){
            $jumlah_bobot[$i] = 0;
            for($j=0;$j<count($saw); $j++){
                $jumlah_bobot[$i] += number_format($nilai_bobot[$j][$i] * 100,2);
                    
                
            }
            // echo $jumlah_bobot[$i]." ";
            // echo "<br>";
        }
// sini

        //gak usah
        // $urutkanbobot = array();
        // $id = DB::table('calon_karyawan')->whereBetween('tanggal_daftar',array('2020-12-26','2020-12-29'))
        // ->where('id_bagian','bg0')->get();
        // $i=0;
        // foreach($id as $id_c){
        //     $urutkanbobot[$i][0]=$id_c->id_calon_karyawan;
        //     $urutkanbobot[$i][1] = number_format($jumlah_bobot[$i],2);
                
        //     // echo $urutkanbobot[$i][0]." ";
        //     // echo $urutkanbobot[$i][1]." ";
        //     // echo "<br>";
        //     $i++;
        // }

        
        // echo "<br>";
        // echo "<br>";
        // rsort($jumlah_bobot,SORT_NUMERIC);
        // $urt=array();
        // for($i=0; $i<count($saw[0]); $i++){
        //     $urt[$i] = number_format($jumlah_bobot[$i],2);
            
        //     // echo $urt[$i]." ";
        //     // echo "<br>";
        // }
        

        // // echo "<br>";
        // // echo "<br>";
        // for($i=0; $i<count($saw[0]); $i++){
            
        //     for($j=0;$j<count($saw[0]); $j++){
        //         if($urutkanbobot[$i][1]==$urt[$j]){
        //             $urutkanbobot[$i][2] = $j+1;
        //             // echo $urutkanbobot[$i][2]." ";
        //         }
        //     }
            
        //     // echo "<br>";
        // }

        return $jumlah_bobot;
    }
    
}
