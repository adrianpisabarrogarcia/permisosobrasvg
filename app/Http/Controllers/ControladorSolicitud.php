<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ControladorSolicitud extends Controller
{
    public function show($id){
        if (Session::exists('usuario'))
        {
            $datosobra = DB::select('select * from obras where id_obra = ?',[$id]);
            $tipobras = DB::select('select * from tipo_obra where id_tipobra = ?',[$datosobra[0]->id_tipo_obra]);
            $tipoedificio = DB::select('select * from tipo_edificio where id = ?',[$datosobra[0]->id_tipo_edificio]);
            $listausuarios = DB::select('select * from usuarios where id_usu = ?',[$datosobra[0]->id_usuario]);
            $listatecnicos = DB::select('select * from usuarios where rol = ? and estado_tecnico = ?',["2","alta"]);
            $listacomentarios = DB::table('comentarios')
                ->where('id_obra','=',$datosobra[0]->id_obra)
                ->orderBy('fecha_comentario','DESC')
                ->paginate(2);
            return view('principal.solicitud')->with([
                'listasolicitudes' => $datosobra,
                'tipo_obra' => $tipobras,
                'tipo_edificio' => $tipoedificio,
                'listausuarios' => $listausuarios,
                'listacomentarios' => $listacomentarios,
                'listatecnicos' => $listatecnicos,
            ]);
        }
        return redirect()->route('login.home');
    }

    public function insert(Request $request){
        if ($request->archivos != null)
        {
            $image = $request->file("archivos");
            $nombrehash = $request->file("archivos")->hashName();
            $image->move('img/archivoscomentarios',$nombrehash);
            $ruta = "/img/archivoscomentarios/" . $nombrehash;
        }
        else
        {
            $ruta = $request->file("archivos");
        }

        DB::table('comentarios')
            ->insert([
                "id_tecnico" => Session::get('id'),
                "id_obra" => $request->idsoli,
                "archivos" => $ruta,
                "descripcion" => $request->comentario,
                "fecha_comentario" => $request->fecha,
            ]);

        $this->contactousu($request);
        return redirect()->route("solicitud.show",$request->idsoli);
    }

    public function contactousu($request){
        $subject = "Permisos y Obras VG";
        $datosobra = DB::select("select * from obras where id_obra = ?",[$request->idsoli]);
        $usuario = DB::select("select * from usuarios where id_usu = ?",[$datosobra[0]->id_usuario]);
        $for = $usuario[0]->email;

        Mail::send('emails.comentario',$request->all(),function ($msj) use ($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz)");
            $msj->subject($subject);
            $msj->to($for);
        });
    }

    public function update(Request $request){
        if ($request->resolucion == "aceptado"){
            DB::update('update obras set estado = ?,fecha_ini = ? where id_obra = ?',[$request->resolucion,$request->fechahoy,$request->idsoli]);
        }
        else
        {
            DB::update('update obras set estado = ?,fecha_ini = ?,fecha_fin = ? where id_obra = ?',[$request->resolucion,null,null,$request->idsoli]);
        }

        $obra = DB::select('select * from obras where id_obra = ?',[$request->idsoli]);
        $usuario = DB::select('select * from usuarios where id_usu = ?',[$obra[0]->id_usuario]);
        $this->contacto($request,$usuario);
        return redirect()->route('solicitud.show',array("id" => $request->idsoli));
    }

    public function contacto($request,$usuario){
        $subject = "Permisos y Obras VG";
        $for = $usuario[0]->email;
        Mail::send('emails.cambioestado',$request->all(),function ($msj) use ($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz)");
            $msj->subject($subject);
            $msj->to($for);
        });
    }

    public function asignartecnico(Request $request){
        DB::update("update obras set estado = ?, id_tecnico = ? where id_obra = ?",["pendiente",$request->tecnico,$request->idsoli]);
        $tecnico = DB::select("select * from usuarios where id_usu = ?",[$request->tecnico]);
        $this->contactotecnico($request,$tecnico);
        return redirect()->route('solicitud.show',array("id" => $request->idsoli));
    }

    public function contactotecnico($request,$tecnico){
        $subject = "Asignación de solicitud";
        $for = $tecnico[0]->email;
        Mail::send('emails.asignacionsolicitud',$request->all(),function ($msj) use ($subject,$for){
           $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz");
           $msj->subject($subject);
           $msj->to($for);
        });
    }

    public function finalizarobra(Request $request){
        DB::update('update obras set estado = ?,fecha_fin = ? where id_obra = ?',["finalizado",$request->fechafin,$request->idsoli]);
        $this->contactousuario($request);
        return redirect()->route('solicitud.show',array("id" => $request->idsoli));
    }

    public function contactousuario(Request $request){
        $subject = "Obra finalizada";
        $for = $request->email;
        Mail::send('emails.finalizarobra',$request->all(),function ($msj) use ($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz");
            $msj->subject($subject);
            $msj->to($for);
        });
    }
}
