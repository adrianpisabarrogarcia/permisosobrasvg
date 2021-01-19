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

/*
 * Route::get('/', function () {
    return view('welcome');
});
 */

//PORTAL
Route::view('/portal', "portal")->name('portal.index');

//LOGIN
//Llamamos al controlador ControladorLogin y a los diferentes metodos para mostrar las vistas
Route::get('/','ControladorLogin@index')->name('login.home');
Route::get('/registro','ControladorLogin@registro')->name('registro.index');
//Validar el dni del que intenta acceder a la pagina
Route::post('/','ControladorLogin@show')->name('login.auth');
Route::post('/registro','ControladorRegistro@store')->name('register');

