<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',function (){
    return view('chart');
});
Route::get('/praytime','JamController@jam');

Route::get('/users','ApiController@users');

Route::get('/get_jam/{lat}/{long}','PrayTimeController@oneday');
Route::post('/rfid','RfidController@index');
Route::get('/itikaf','RegisterController@index');
Route::post('/itikaf','RegisterController@store');
Route::get('/pendaftaran','RegisterController@utama');
Route::get('/cektlpn/{tlpn}','RegisterController@cektlpn');
Route::get('/cekrfid/{uid}','RegisterController@cekRfid');
Route::get('/updaterfid/{id}/{uid}','RegisterController@updateRfid');
Route::post('/pendaftaran','RegisterController@simpan');
Route::post('admin/jamaah/search','Admin\JamaahController@search');
Route::post('admin/rfid/search','Admin\RfidController@search');
