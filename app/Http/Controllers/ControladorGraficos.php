<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorGraficos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("principal.coordinador.graficos");
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
    public function show($filtro)
    {
        $obras = DB::select("select id_obra, id_tipo_obra, estado, fecha_creacion from obras");

        switch ($filtro) {
            case "estado":
                $pendiente = 0;
                $creada = 0;
                $aceptada = 0;
                $rechazada = 0;
                foreach ($obras as $obra) {
                    switch ($obra->estado) {
                        case "creado":
                            $creada++;
                            break;
                        case "pendiente":
                            $pendiente++;
                            break;
                        case "aceptado":
                            $aceptada++;
                            break;
                        default:
                            $rechazada++;
                    }

                }
                $pendiente = $pendiente * 100 / count($obras);
                $creada = $creada * 100 / count($obras);
                $aceptada = $aceptada * 100 / count($obras);
                $rechazada = $rechazada * 100 / count($obras);
                $datos = [
                    "obras" => count($obras),
                    "pendiente" => $pendiente,
                    "creada" => $creada,
                    "aceptada" => $aceptada,
                    "rechazada" => $rechazada
                ];


                break;
            case "temporada":

                $datos = [
                    ["mes" => "Enero", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Febrero", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Marzo", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Abril", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Mayo", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Junio", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Julio", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Agosto", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Septiembre", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Octubre", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Noviembre", "cantidad" => 0, "porcentaje" => 0],
                    ["mes" => "Diciembre", "cantidad" => 0, "porcentaje" => 0]
                ];
                foreach ($obras as $obra) {
                    switch (date("F", strtotime($obra->fecha_creacion))) {
                        case "January":
                            $datos[0]["cantidad"]++;
                            break;
                        case "February":
                            $datos[1]["cantidad"]++;
                            break;
                        case "March":
                            $datos[2]["cantidad"]++;
                            break;
                        case "April":
                            $datos[3]["cantidad"]++;
                            break;
                        case "May":
                            $datos[4]["cantidad"]++;
                            break;
                        case "June":
                            $datos[5]["cantidad"]++;
                            break;
                        case "July":
                            $datos[6]["cantidad"]++;
                            break;
                        case "August":
                            $datos[7]["cantidad"]++;
                            break;
                        case "September":
                            $datos[8]["cantidad"]++;
                            break;
                        case "October":
                            $datos[9]["cantidad"]++;
                            break;
                        case "November":
                            $datos[10]["cantidad"]++;
                            break;
                        default:
                            $datos[11]["cantidad"]++;

                    }
                }
                for ($x = 0; $x < count($datos); $x++) {
                    $datos[$x]["porcentaje"] = $datos[$x]["cantidad"] * 100 / count($obras);

                }


                break;
            case "tipo":
                $obras = DB::select("select id_obra, id_tipo_obra, estado, fecha_creacion from obras");

                $tipoObra = DB::select("select * from tipo_obra");
                $cantidad = 0;
                $porcentaje = 0;

                $datos = [];

                foreach ($tipoObra as $tipo) {
                    $objeto = [
                        "id" => $tipo->id_tipobra,
                        "tipo" => $tipo->tipo,
                        "cantidad" => $cantidad,
                        "porcentaje" => $porcentaje
                    ];

                    array_push($datos, $objeto);
                }
                foreach ($obras as $obra) {

                    for ($x = 0; $x < count($datos); $x++) {
                        if ($obra->id_tipo_obra == $datos[$x]["id"]) {
                            $datos[$x]["cantidad"]++;
                        }
                    }
                }
                for ($x = 0; $x < count($datos); $x++) {
                    $datos[$x]["porcentaje"] = $datos[$x]["cantidad"] * 100 / count($obras);
                    unset($datos[$x]["id"]);
                    unset($datos[$x]["cantidad"]);

                }
                break;
            default:
                $obrasSinAsignar = DB::select("select id_obra, id_tipo_obra, estado, fecha_creacion from obras where id_tecnico is null");

                $obrasAsignadas = DB::select("select id_obra, id_tipo_obra, estado, fecha_creacion from obras where id_tecnico is not null");
                $datos= [
                    ["tipo"=>"asignadas",
                        "porcentaje"=>count($obrasAsignadas)*100/count($obras)],
                    ["tipo"=>"sin asignar",
                        "porcentaje"=>count($obrasSinAsignar)*100/count($obras)],

                ];
        }

        return $datos;
    }

    function select()
    {
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
