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
Route::get('login', 'LoginController@index');
Route::post('auth-login', 'LoginController@store');
Route::get('registrasi', 'RegisterController@index');
Route::post('auth-register', 'RegisterController@store');

Route::get('/', function () {
    return view('admin.index');
});

Route::get('admin/kategori','KategoriController@list');
Route::get('admin/kategori/create','KategoriController@create');
Route::post('admin/kategori/save','KategoriController@save');
Route::get('admin/kategori/edit/{id}','KategoriController@edit');
Route::post('admin/kategori/update/{id}','KategoriController@update');
Route::get('admin/kategori/delete/{id}','KategoriController@delete');
Route::get('admin/kategori/galeri','KategoriController@galeri');
Route::get('admin/kategori/table/{id}','KategoriController@kat_table');

Route::get('admin/resep','ResepController@list');
Route::get('admin/resep/create','ResepController@create');
Route::post('admin/resep/save','ResepController@save');
Route::get('admin/resep/edit/{id}','ResepController@edit');
Route::post('admin/resep/update/{id}','ResepController@update');
Route::get('admin/resep/delete/{id}','ResepController@delete');

Route::get('admin/user-list','UserListController@list');

