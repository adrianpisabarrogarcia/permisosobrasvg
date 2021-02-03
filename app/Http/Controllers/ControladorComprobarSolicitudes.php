<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorComprobarSolicitudes extends Controller
{
    public function show()
    {
        if (!Session::exists('usuario') || Session::get('rol') == "3"){
            return redirect()->route('login.home');
        }
        $datosSolicitudes = DB::table('obras')
            ->join('usuarios', 'obras.id_usuario', '=', 'usuarios.id_usu')
            ->join('tipo_edificio', 'obras.id_tipo_edificio', '=', 'tipo_edificio.id')
            ->join('tipo_obra', 'obras.id_tipo_obra', '=', 'tipo_obra.id_tipobra')
            ->select('obras.*', 'usuarios.nombre', 'usuarios.apellido', 'tipo_edificio.tipo as tipoedificio', 'tipo_obra.tipo')
            ->get();
        $tecnicos = [];
        foreach($datosSolicitudes as $datos){
            $tecnico = DB::select("select * from usuarios where id_usu = ?",[$datos->id_tecnico]);
            if (count($tecnico)>0){
                array_push($tecnicos, $tecnico[0]->nombre . " " . $tecnico[0]->apellido);
            }else{
                array_push($tecnicos, "-");
            }
        }
        return view("principal.comprobarSolicitudes")->with([
            "datosSolicitudes" => $datosSolicitudes,
            "tecnicos" => $tecnicos]);
    }
}
