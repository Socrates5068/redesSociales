<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/comunicados', 'ComunicadoController@index')->name('comunicados.index');
Route::get('/comunicados/create', 'ComunicadoController@create')->name('comunicados.create');
Route::post('/comunicados', 'ComunicadoController@store')->name('comunicados.store');
Route::get('/comunicados/{comunicado}', 'ComunicadoController@show')->name('comunicados.show');
Route::get('/comunicados/{comunicado}/edit', 'ComunicadoController@edit')->name('comunicados.edit');
Route::put('/comunicados/{comunicado}', 'ComunicadoController@update')->name('comunicados.update');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
