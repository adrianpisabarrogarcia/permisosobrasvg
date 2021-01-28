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
Route::get('/portal', "ControladorPortal@index")->name('portal.index');
Route::post('/portal','ControladorPortal@logout')->name('portal.logout');
Route::get("/solicitarobra", "ControladorSolicitudes@show")->name("solicitarObra");
Route::get("/contacto","ControladorContacto@show")->name("contacto");


//Rutas para coordinadores
Route::get("/asignarSolicitudes","ControladorCoordinador@asignarSolicitudes")->name("asignarSolicitudes");
Route::get("/graficos","ControladorCoordinador@verGraficos")->name("portal.graficos");
Route::get("/creacionusuarios","ControladorCoordinador@crearUsuarios")->name("creacionUsuarios");
Route::get("/listadousuarios","ControladorUsuarios@show")->name("listarUsuarios");
Route::get('/listadousuarios/{id}','ControladorUsuarios@destroy')->name("borrarUsuario");


//Rutas para tecnicos
Route::get("/solicitudesPendientes","ControladorTecnico@SolicitudesPendientes")->name("solicitudesPendientes");

//Rutas para coordinadores y tecnicos
Route::get("/comprobarSolicitudes","ControladorEnlaces@comprobarSolicitudes")->name("comprobarSolicitudes");





//LOGIN
//Llamamos al controlador ControladorLogin y a los diferentes metodos para mostrar las vistas
Route::get('/','ControladorLogin@index')->name('login.home');
Route::get('/registro','ControladorLogin@registro')->name('registro.index');
//Validar el dni del que intenta acceder a la pagina
Route::post('/','ControladorLogin@show')->name('login.auth');
Route::post('/registro','ControladorRegistro@store')->name('register');


