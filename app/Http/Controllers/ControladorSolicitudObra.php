<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Mail;

class ControladorSolicitudObra extends Controller
{
    public function store(Request $request)
    {
        //informacion de usuario
        $dni = Session::get("usuario");
        $usuario = DB::select("select * from usuarios where dni= ? ", [$dni]);
        $id_usu = $usuario[0]->id_usu;
        //conseguir ruta del archivo
        $archivo = $request->file("plano");
        $nombrehash = $request->file("plano")->hashName();
        $archivo->move('img/planos',$nombrehash);
        $rutaArchivo = "/img/planos/" . $nombrehash;

        DB::table("obras")->insert([
            "id_tipo_edificio" => $request->edificio,
            "id_tipo_obra" => $request->obra,
            "id_usuario" => $id_usu,
            "calle" => $request->direccion,
            "lat" => $request->lat,
            "lng" => $request->lng,
            "numero" => $request->portal,
            "piso" => $request->piso,
            "mano" => $request->escalera,
            "codigo_postal" => $request->cp,
            "fecha_creacion" => $request->fecha,
            "fecha_ini" => null,
            "fecha_fin" => null,
            "plano" => $rutaArchivo,
            "estado" => "creado",
            "descrip" => $request->mensaje
        ]);
        $this->contacto($usuario, $request);
        return redirect()->route("portal.index");
    }

    public function contacto($usuario, $request)
    {
        $subject = "Solicitud de obra creada.";
        $for = $usuario[0]->email;
        Mail::send('emails.solicitudCreada', $request->all(), function ($msj) use ($subject, $for) {
            $msj->from("developersweapp@gmail.com", "Permisos y Obras VG");
            $msj->subject($subject);
            $msj->to($for);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (!Session::exists('usuario') || Session::get('rol') != "3"){
            return redirect()->route('login.home');
        }
        $dni = Session::get("usuario");
        $usuario = DB::select("select * from usuarios where dni= ? ", [$dni]);
        $tipoEdificio = DB::select("select * from tipo_edificio");
        //$tipoEdificio=DB::table("tipo_edificio");
        $tipoObra = DB::select("select * from tipo_obra");
        //$tipoObra=DB::table("tipo_obra");
        return view("principal.usuarios.solicitarObra")->with(
            [
                "usuario" => $usuario,
                "tipoEdificios" => $tipoEdificio,
                "tipoObras" => $tipoObra
            ]);
    }
}
