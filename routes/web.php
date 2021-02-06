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
        //Portal
            Route::get('/portal', "ControladorPortal@index")->name('portal.index');
            Route::post('/portal','ControladorPortal@logout')->name('portal.logout');
            Route::post('/filtro','ControladorPortal@ajax')->name('portal.ajax');
        //Solicitar Obra
            Route::get("/solicitarobra", "ControladorSolicitudObra@show")->name("solicitarObra");
            Route::post("/solicitarObras","ControladorSolicitudObra@store")->name("solicitarObra.insert");
        //Contacto
            Route::get("/contacto","ControladorContacto@index")->name("contacto");
            Route::post("/contacto","ControladorContacto@show")->name("enviarContacto");
        //Perfil
            Route::get("/perfil","ControladorPerfil@show")->name("perfil");
            Route::post("/modificarPerfil","ControladorPerfil@updateDatos")->name("modificarPerfil");
            Route::post("cambiarContra","ControladorPerfil@updatePassword")->name("cambiarContra");
            Route::get("/perfil/borrarUsuario","ControladorPerfil@destroy")->name("borrarUsuario");

    //Rutas para coordinadores
        //AsignarSolicitudes
            Route::get("/solicitudespendientesasignar","ControladorSolicitudesSinAsignar@show")->name("solicitudesSinAsignar");
        //Graficos
            Route::get('/graficos','ControladorGraficos@index')->name('portal.graficos');
            Route::get("/graficos/{estado}","ControladorGraficos@show")->name("graficos");
        //Creación de usuarios
            Route::get("/crearusuarios","ControladorCrearUsuarios@show")->name("creacionUsuarios");
            Route::post('/crearusuariosregistro','ControladorCrearUsuarios@store')->name('creacionUsuarioSave');
        //Listado de usuarios
            Route::get("/listadousuarios","ControladorUsuarios@show")->name("listarUsuarios");
            Route::get('/listadousuarios/{id}','ControladorUsuarios@destroy')->name("borrarUsuario");
            Route::get('/annadirobraedificio','ControladorAnnadirTObraTEdificio@show')->name("annadirObraEdificio");
            Route::post('/annadirobraedificio/annadirobra','ControladorAnnadirTObraTEdificio@annadirTObra')->name("annadirObra");
            Route::post('/annadirobraedificio/annadiredificio','ControladorAnnadirTObraTEdificio@annadirTEdificio')->name("annadirEdificio");
            Route::get('/annadirobraedificio/borrarobra/{id}','ControladorAnnadirTObraTEdificio@destroyObra')->name("borrarUsuario");
            Route::get('/annadirobraedificio/borraredificio/{id}','ControladorAnnadirTObraTEdificio@destroyEdificio')->name("borrarUsuario");

//Rutas para coordinadores y tecnicos
    Route::get("/comprobarsolicitudes","ControladorComprobarSolicitudes@show")->name("comprobarSolicitudes");

//SOLICITUD
    Route::get('/solicitud/{id}','ControladorSolicitud@show')->name('solicitud.show');
    Route::post('/solicitud', 'ControladorSolicitud@insert')->name('solicitud.insert');
    Route::patch("/solicitud",'ControladorSolicitud@update')->name('cambioestado');

//LOGIN
    //Validar el dni del que intenta acceder a la pagina
        Route::post('/','ControladorLogin@show')->name('login.auth');
        Route::post('/registro','ControladorRegistro@store')->name('register');
    //Llamamos al controlador ControladorLogin y a los diferentes metodos para mostrar las vistas
        Route::get('/','ControladorLogin@index')->name('login.home');
        Route::get('/registro','ControladorLogin@registro')->name('registro.index');
        Route::get('/restablecer','ControladorLogin@restablecer')->name('restcontra.index');
        Route::post('/restablcer','ControladorLogin@authemail')->name('restablecer.auth');
        Route::post('/codigo','ControladorLogin@authcodigo')->name('codigo.auth');
        Route::patch('/contra','ControladorLogin@modificarcontra')->name('modificar.contra');

//Asignar tecnico
    Route::patch('/asignartecnico','ControladorSolicitud@asignartecnico')->name('asignartecnico.update');

    Route::post('/listadousuarios/estadotecnico','ControladorUsuarios@cambiarEstadoTecnico')->name("cambiarEstadoTecnico");
    Route::patch('/finalizarobra/','ControladorSolicitud@finalizarobra')->name('finalizarobra');


