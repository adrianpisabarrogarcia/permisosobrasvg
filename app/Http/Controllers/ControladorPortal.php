<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorPortal extends Controller
{
    public function index(){
        if (!Session::exists('usuario')){
            return redirect()->route('login.home');
        }

        switch (Session::get('rol'))
        {
            case "1":
                $solicitudes = DB::table('obras')
                    ->orderBy('fecha_creacion','DESC')
                    ->paginate(4);
                break;
            case"2":
                $solicitudes = DB::table('obras')
                    ->where('id_tecnico','=',Session::get('id'))
                    ->orderBy('fecha_creacion','DESC')
                    ->paginate(4);
                break;
            default:
                $solicitudes = DB::table('obras')
                    ->where('id_usuario','=',Session::get('id'))
                    ->orderBy('fecha_creacion','DESC')
                    ->paginate(4);
        }

        $tipobras = DB::select('select * from tipo_obra');
        $listausuarios = DB::select('select * from usuarios');
        return view('principal.portal')->with([
            'listasolicitudes' => $solicitudes,
            'tipo_obra' => $tipobras,
            'listausuarios' => $listausuarios
        ]);
    }

    public function logout(){
        Session::remove('usuario');

        return redirect()->route('login.home');
    }

    public function ajax(Request $request){
        switch (Session::get('rol'))
        {
            case "1":
                $solicitudes = DB::table('obras')
                    ->where('estado','=',$request->estado)
                    ->orderBy('fecha_creacion','DESC')
                    ->paginate(4);
                break;
            case"2":
                $solicitudes = DB::table('obras')
                    ->where('id_tecnico','=',Session::get('id'))
                    ->where('estado','=',$request->estado)
                    ->orderBy('fecha_creacion','DESC')
                    ->paginate(4);
                break;
            default:
                $solicitudes = DB::table('obras')
                    ->where('id_usuario','=',Session::get('id'))
                    ->where('estado','=',$request->estado)
                    ->orderBy('fecha_creacion','DESC')
                    ->paginate(4);
        }

        if ($request->estado == "quitar")
            return redirect()->route('portal.index');
        else
        {
            $tipobras = DB::select('select * from tipo_obra');
            $listausuarios = DB::select('select * from usuarios');
            return view('principal.portal')->with([
                'listasolicitudes' => $solicitudes,
                'tipo_obra' => $tipobras,
                'listausuarios' => $listausuarios,
                'estado' => $request->estado,
            ]);

        }
    }
}
