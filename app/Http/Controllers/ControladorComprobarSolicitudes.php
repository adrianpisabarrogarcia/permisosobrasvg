<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ControladorComprobarSolicitudes extends Controller
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
