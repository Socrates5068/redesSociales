<?php

use App\Http\Controllers\InicioController;
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

Route::get('/', 'InicioController@index')->name('inicio.index');
Route::get('/prueba', 'PruebaController@index')->name('prueba.index');

Route::get('/comunicados', 'ComunicadoController@index')->name('comunicados.index');
Route::get('/comunicados/create', 'ComunicadoController@create')->name('comunicados.create');
Route::post('/comunicados', 'ComunicadoController@store')->name('comunicados.store');
Route::get('/comunicados/{comunicado}', 'ComunicadoController@show')->name('comunicados.show');
Route::get('/comunicados/{comunicado}/edit', 'ComunicadoController@edit')->name('comunicados.edit');
Route::put('/comunicados/{comunicado}', 'ComunicadoController@update')->name('comunicados.update');
Route::delete('/comunicados/{comunicado}', 'ComunicadoController@destroy')->name('comunicados.destroy');

#imagenes
Route::post('/imagenes/store', 'ImagenController@store')->name('imagenes.store');
Route::post('/imagenes/destroy', 'ImagenController@destroy')->name('imagenes.destroy');

#archivos
Route::post('/archivo/store', 'ArchivoController@store')->name('archivo.store');
Route::post('/archivo/destroy', 'ArchivoController@destroy')->name('archivo.destroy');

//Buscador de comunicados
Route::get('/buscar', 'ComunicadoController@search')->name('buscar.show');

Route::get('/perfiles/{perfil}','PerfilController@show')->name('perfiles.show');
Route::get('/perfiles/{perfil}/edit','PerfilController@edit')->name('perfiles.edit');
Route::get('/perfiles','PerfilController@editrol')->name('perfiles.editrol');
Route::put('/perfiles/{perfil}', 'PerfilController@update')->name('perfiles.update');

Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
Route::get('/usuarios/{user}/edit', 'UserController@edit')->name('usuarios.edit');
Route::put('/usuarios/{user}', 'UserController@update')->name('usuarios.update');

//Condiciones y servicios
Route::get('/politica', function (){
    return view('/condiciones/show');
});

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
