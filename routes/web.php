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
//home
Route::get('/', 'UserController@index');
Route::post('/selectKota', 'UserController@selectKota');
Route::post('/selectGejala', 'UserController@selectGejala');
Route::post('/selectGejala2', 'UserController@selectGejala2');

//login logout admin
Route::get('/admin', 'AdminController@auth');
Route::get('/login', 'AdminController@login');
Route::post('/loginPost', 'AdminController@loginPost');
Route::get('/logout', 'AdminController@logout');

//crud nomertelephone
Route::get('/admin/tambahrs', 'AdminController@tambahrs');
Route::post('/rspost', 'AdminController@rsPost');
Route::delete('/admin/hapusrs/{namaRS}', 'AdminController@hapusrs');

//crud penyakit
Route::get('/admin/tambahskt', 'AdminController@tambahskt');
Route::post('/sktpost', 'AdminController@sktPost');
Route::delete('/admin/hapusskt/{namaPenyakit}', 'AdminController@hapusskt');

//crud obat
Route::get('/admin/tambahobt', 'AdminController@tambahobt');
Route::post('/obtpost', 'AdminController@obtPost');
Route::delete('/admin/hapusobat/{namaObat}', 'AdminController@hapusobt');


Route::get('/register', 'AdminController@register');
Route::post('/registerPost', 'AdminController@registerPost');
