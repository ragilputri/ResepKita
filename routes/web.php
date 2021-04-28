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
    return view('admin.index');
});
Route::get('login', 'LoginController@index');
Route::post('auth-login', 'LoginController@store');
Route::get('registrasi', 'RegisterController@index');
Route::post('auth-register', 'RegisterController@store');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {

});

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function () {

});
