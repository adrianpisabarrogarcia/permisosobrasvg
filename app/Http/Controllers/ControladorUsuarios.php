<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorUsuarios extends Controller
{
    public function show()
    {
        //solo si eres técnico y coordinador
        if (!Session::exists('usuario') || Session::get('rol') == "3"){
            return redirect()->route('login.home');
        }
        //mostrar datos de los usuarios
        $datosUsuarios = DB::select('select * from usuarios');
        return view("principal.tablaUsuarios")->with([
            "datosUsuarios" => $datosUsuarios]);
    }

    public function destroy($id)
    {
        //eliminar un usuario concreto
        DB::table('usuarios')->where('id_usu', '=', $id)->delete();
        return $this->show();
    }
    public function cambiarEstadoTecnico(Request $request)
    {
        //cambiar de estado al técnico: alta o baja
        DB::table('usuarios')
            ->where('id_usu', '=', $request->get('id'))
            ->update(['estado_tecnico' => $request->get('estado-tecnico')]);

        return redirect()->route('listarUsuarios');
    }
}
