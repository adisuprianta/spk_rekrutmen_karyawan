<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//halaman kriteria
Route::get('/kriteria', "KriteriaController@index")->middleware('auth');
Route::post('/kriteria', "KriteriaController@panggil")->middleware('auth');


//memanggil halaman kriteria produksi dan hitung kriteria
Route::get('/kriteria/produksi', "KriteriaController@produksi")->middleware('auth');
Route::post('/kriteria/produksi/update', "KriteriaController@updateproduksi")->middleware('auth');
//memanggil halaman kriteria nonproduksi dan hitung kriteria
Route::get('/kriteria/nonproduksi', "KriteriaController@nonproduksi")->middleware('auth');
Route::post('/kriteria/nonproduksi/update', "KriteriaController@updatenonproduksi")->middleware('auth');




//tespraktik
Route::get('/kriteria/produksi/praktik', 'SubKriteria_Controller@tespraktik')->middleware('auth');
Route::post('/produksi/praktik/update', 'SubKriteria_Controller@updatetespraktik')->middleware('auth');
//teswawancaraproduksi
Route::get('/kriteria/produksi/wawancara',  'SubKriteria_Controller@teswawancarap')->middleware('auth');
Route::post('/produksi/wawancara/update',  'SubKriteria_Controller@updateteswawancarap')->middleware('auth');


//teswawancaraproduksi
Route::get('/kriteria/nonproduksi/wawancara', 'SubKriteria_Controller@wawancaran')->middleware('auth');
Route::post('/nonproduksi/wawancara/update', 'SubKriteria_Controller@updatewawancaran')->middleware('auth');

//psikotes
Route::get('/kriteria/nonproduksi/psikotes', 'SubKriteria_Controller@psikotes')->middleware('auth');
Route::post('/nonproduksi/psikotes/update', 'SubKriteria_Controller@updatepsikotes')->middleware('auth');


//memanggil karyawan
// Route::get('/home/produksi', "KaryawanController@produksi")->middleware('auth');
Route::get('/home/{nama}', "KaryawanController@karyawan")->middleware('auth');
Route::get('/home/karyawan/{id}',"KaryawanController@karyawaninput")->middleware('auth');
Route::post('/karyawan/input', "KaryawanController@input");


//karyawan check
Route::get('karyawan/check/{id}/{val}',"KaryawanController@karyawanCheck")->middleware('auth');

// memanggil input saw
// Route::post('/home/produksi', function(){
//     return view ('inputnilaisaw');
// })->middleware('auth');
// Route::get('home/{produksi}/{id}','ControllerSaw@inputsaw')->middleware('auth');
Route::post('home/{produksi}/{id}','ControllerSaw@tampilsaw')->middleware('auth');
Route::post('home/Produksi/input/saw', 'ControllerSaw@inputsaw')->middleware('auth');
Route::post('home/NonProduksi/input/saw', 'ControllerSaw@inputsaw')->middleware('auth');

Route::get('tes', 'ControllerSaw@hitungsaw');