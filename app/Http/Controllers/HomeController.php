<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tglakhir = date('Y-m-d');
        $tglawal =date('Y-m-d', strtotime('-1 month', strtotime($tglakhir)));
        $acc = DB::table('calon_karyawan')->where('approve','1')->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))->get();
        $tolak = DB::table('calon_karyawan')->where('approve','0')->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))->get();
        $total = DB::table('calon_karyawan')->whereBetween('tanggal_daftar',array($tglawal,$tglakhir))->get();
        return view('dashboard',['acc'=>$acc,'tolak'=>$tolak,'total'=>$total]);
    }
}
