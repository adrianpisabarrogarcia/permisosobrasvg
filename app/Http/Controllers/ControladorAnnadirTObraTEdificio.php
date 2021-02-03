<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ControladorAnnadirTObraTEdificio extends Controller
{
    public function show($errorO = '', $errorE = '')
    {
        if (!Session::exists('usuario') || Session::get('rol') != "1"){
            return redirect()->route('login.home');
        }
        else
        {
            $obras = DB::select("select tipo from tipo_obra");
            $edificios = DB::select("select tipo from tipo_edificio");
            return view("principal.coordinador.annadirTObraTEdificio")->with([
                'obras' => $obras,
                'edificios' => $edificios,
                'errorO' => $errorO,
                'errorE' => $errorE
            ]);
        }
    }

    public function destroyObra($id)
    {
        DB::table('tipo_obra')->where('tipo', '=', $id)->delete();
        return $this->show();
    }
    public function destroyEdificio($id)
    {
        DB::table('tipo_edificio')->where('tipo', '=', $id)->delete();
        return $this->show();
    }
    public function annadirTEdificio(Request $request)
    {
        $tipoEdificio = strtolower ($request->get('annadiredificio'));
        $datosTipoEdificio = DB::select('select tipo from tipo_edificio where tipo = ?', [$tipoEdificio]);
        if (!(count($datosTipoEdificio) > 0)) {
            DB::table('tipo_edificio')->insert([
                'tipo' => $tipoEdificio
            ]);
            return $this->show();
        }
        return $this->show('','El tipo de edificio ya existe');
    }
    public function annadirTObra(Request $request)
    {
        $tipoObra = strtolower($request->get('annadirobra'));
        $datosTipoObra = DB::select('select tipo from tipo_obra where tipo = ?', [$tipoObra]);
        if (!(count($datosTipoObra) > 0)) {
            DB::table('tipo_obra')->insert([
                'tipo' => $tipoObra
            ]);
            return $this->show();
        }
        return $this->show('El tipo de obra ya existe','');
    }
}
