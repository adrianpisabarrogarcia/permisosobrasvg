<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorSolicitudesSinAsignar extends Controller
{
    public function show()
    {
        //solo si eres coordiandor
        if (!Session::exists('usuario') || Session::get('rol') != "1"){
            return redirect()->route('login.home');
        }
        //asignamos directamente la solicitud
        $datosSolicitudes = DB::table('obras')
            ->join('usuarios', 'obras.id_usuario', '=', 'usuarios.id_usu')
            ->join('tipo_edificio', 'obras.id_tipo_edificio', '=', 'tipo_edificio.id')
            ->join('tipo_obra', 'obras.id_tipo_obra', '=', 'tipo_obra.id_tipobra')
            ->select('obras.*', 'usuarios.nombre', 'usuarios.apellido','tipo_edificio.tipo as tipoedificio','tipo_obra.tipo')
            ->where('obras.estado', '=', 'creado')
            ->get();
        return view("principal.coordinador.SolicitudesSinAsignar")->with([
            "datosSolicitudes" => $datosSolicitudes]);
    }
}
