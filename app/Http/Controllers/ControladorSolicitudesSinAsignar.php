<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ControladorSolicitudesSinAsignar extends Controller
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
    public function show()
    {
        //$datosSolicitudes = DB::select('select * from obras where estado = "creado"');
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
    public function destroy($id)
    {
        //
    }
}
