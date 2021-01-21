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
//Rutas generales
Route::view('/portal', "portal")->name('portal.index');
Route::get("/solicitarObra", "ControladorEnlaces@solicitarObra")->name("solicitarObra");
Route::get("/contacto","ControladorEnlaces@contacto")->name("contacto");

//Rutas para coordinadores
Route::get("/asignarSolicitudes","ControladorCoordinador@asignarSolicitudes")->name("asignarSolicitudes");
Route::get("/graficos","ControladorCoordinador@verGraficos")->name("graficos");
Route::get("creacionUsuarios","ControladorCoordinador@crearUsuarios")->name("creacionUsuarios");

//Rutas para tecnicos
Route::get("/solicitudesPendientes","ControladorTecnico@SolicitudesPendientes")->name("solicitudesPendientes");

//Rutas para coordinadores y tecnicos
Route::get("/informacionUsuarios","ControladorEnlaces@consultarUsuarios")->name("tablas");
Route::get("/comprobarSolicitudes","ControladorEnlaces@comprobarSolicitudes")->name("comprobarSolicitudes");





//LOGIN
//Llamamos al controlador ControladorLogin y a los diferentes metodos para mostrar las vistas
Route::get('/','ControladorLogin@index')->name('login.home');
Route::get('/registro','ControladorLogin@registro')->name('registro.index');
//Validar el dni del que intenta acceder a la pagina
Route::post('/','ControladorLogin@show')->name('login.auth');
Route::post('/registro','ControladorRegistro@store')->name('register');


