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

Route::get('/kriteria', "KriteriaController@index")->middleware('auth');
Route::post('/kriteria', "KriteriaController@panggil")->middleware('auth');

Route::get('/kriteria/produksi', "KriteriaController@produksi")->middleware('auth');
Route::post('/kriteria/produksi/update', "KriteriaController@updateproduksi")->middleware('auth');
Route::get('/kriteria/nonproduksi', "KriteriaController@nonproduksi")->middleware('auth');
Route::post('/kriteria/nonproduksi/update', "KriteriaController@updatenonproduksi")->middleware('auth');

Route::get('/home/produksi', "KaryawanController@produksi")->middleware('auth');
Route::get('/home/nonproduksi', "KaryawanController@nonproduksi")->middleware('auth');
// Route::post('/karyawan', "KaryawanController@panggil");

Route::get('/kriteria/produksi/praktik', function(){
    return view('tespraktik');
})->middleware('auth');

Route::get('/kriteria/produksi/wawancara', function(){
    return view('teswawancaraproduksi');
})->middleware('auth');