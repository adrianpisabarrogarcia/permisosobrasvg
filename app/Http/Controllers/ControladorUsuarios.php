<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorUsuarios extends Controller
{
    public function show()
    {
        if (!Session::exists('usuario') || Session::get('rol') == "3"){
            return redirect()->route('login.home');
        }
        $datosUsuarios = DB::select('select * from usuarios');
        return view("principal.tablaUsuarios")->with([
            "datosUsuarios" => $datosUsuarios]);
    }

    public function destroy($id)
    {
        DB::table('usuarios')->where('id_usu', '=', $id)->delete();
        return $this->show();
    }
    public function cambiarEstadoTecnico(Request $request)
    {
        DB::table('usuarios')
            ->where('id_usu', '=', $request->get('id'))
            ->update(['estado_tecnico' => $request->get('estado-tecnico')]);

        return redirect()->route('listarUsuarios');
    }
}
