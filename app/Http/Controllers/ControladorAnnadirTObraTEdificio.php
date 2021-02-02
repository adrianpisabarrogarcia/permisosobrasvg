<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ControladorAnnadirTObraTEdificio extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($errorO = '', $errorE = '')
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
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
