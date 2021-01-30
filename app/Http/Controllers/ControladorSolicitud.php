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
            $listacomentarios = DB::table('comentarios')
                ->where('id_obra','=',$datosobra[0]->id_obra)
                ->orderBy('fecha_comentario','DESC')
                ->paginate(2);
            return view('principal.solicitud')->with([
                'listasolicitudes' => $datosobra,
                'tipo_obra' => $tipobras,
                'tipo_edificio' => $tipoedificio,
                'listausuarios' => $listausuarios,
                'listacomentarios' => $listacomentarios
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
}
