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

Route::get('/', 'App\Http\Controllers\DashboardController@index');

//Salon 
Route::get('/salon', 'App\Http\Controllers\SalonController@index');
Route::post('/salon/tambah', 'App\Http\Controllers\SalonController@store');
Route::get('/salon/{salon}/edit', 'App\Http\Controllers\SalonController@edit');
Route::put('/salon/{salon}', 'App\Http\Controllers\SalonController@update');
Route::delete('/salon/{salon}', 'App\Http\Controllers\SalonController@destroy');

//Layanan
Route::get('/layanan', 'App\Http\Controllers\LayananController@index');
Route::post('/layanan/tambah', 'App\Http\Controllers\LayananController@store');
Route::get('/layanan/{layanan}/tam', 'App\Http\Controllers\LayananController@tambahSalon');
Route::get('/layanan/{layanan}/info', 'App\Http\Controllers\LayananController@show');
Route::get('/layanan/{layanan}/ubah', 'App\Http\Controllers\LayananController@edit');
Route::put('/layanan/{layanan}', 'App\Http\Controllers\LayananController@update');
Route::delete('/layanan/{layanan}', 'App\Http\Controllers\LayananController@destroy');


//Pelanggan
Route::get('/pelanggan', 'App\Http\Controllers\PelangganController@index');
Route::post('/pelanggan/tambah', 'App\Http\Controllers\PelangganController@store');
Route::get('/pelanggan/{pelanggan}/info', 'App\Http\Controllers\PelangganController@show');
Route::get('/pelanggan/{pelanggan}/edit', 'App\Http\Controllers\PelangganController@edit');
Route::put('/pelanggan/{pelanggan}', 'App\Http\Controllers\PelangganController@update');
Route::delete('/pelanggan/{pelanggan}', 'App\Http\Controllers\PelangganController@destroy');


//paket perawatan
Route::get('/paket', 'App\Http\Controllers\PaketController@index');
Route::post('/paket/tambah', 'App\Http\Controllers\PaketController@store');
Route::get('/paket/{paket}/info', 'App\Http\Controllers\PaketController@show');
Route::get('/paket/{paket}/edit', 'App\Http\Controllers\PaketController@edit');
Route::put('/paket/{paket}', 'App\Http\Controllers\PaketController@update');
Route::delete('/paket/{paket}', 'App\Http\Controllers\PaketController@destroy');


//boking
Route::get('/boking', 'App\Http\Controllers\BokingController@index');