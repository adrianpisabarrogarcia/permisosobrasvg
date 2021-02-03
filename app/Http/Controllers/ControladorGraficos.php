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

    public function show($filtro)
    {
        $obras = DB::select("select id_obra, id_tipo_obra, estado, fecha_creacion from obras");

        switch ($filtro) {
            case "estado":
                $pendiente = 0;
                $creada = 0;
                $aceptada = 0;
                $rechazada = 0;
                $finalizada = 0;
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
                        case "finalizado":
                            $finalizada++;
                            break;
                        default:
                            $rechazada++;
                    }

                }
                $pendiente = $pendiente * 100 / count($obras);
                $creada = $creada * 100 / count($obras);
                $aceptada = $aceptada * 100 / count($obras);
                $rechazada = $rechazada * 100 / count($obras);
                $finalizada = $finalizada * 100 / count($obras);

                $datos = [
                    "obras" => count($obras),
                    "pendiente" => $pendiente,
                    "creada" => $creada,
                    "aceptada" => $aceptada,
                    "rechazada" => $rechazada,
                    "finalizada"=> $finalizada
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
                //bucle para coger objetos de posicion 0 y 1 de tipos de obra: reforma y nueva obra
                for($x=0; $x<2; $x++ ){
                    $objeto = [
                        "id" => $tipoObra[$x]->id_tipobra,
                        "tipo" => $tipoObra[$x]->tipo,
                        "cantidad" => $cantidad,
                        "porcentaje" => $porcentaje
                    ];
                    array_push($datos, $objeto);
                }
                $objetoOtrosTipos = [
                    "tipo" => "Otros",
                    "cantidad" => $cantidad,
                    "porcentaje" => $porcentaje
                ];
                array_push($datos, $objetoOtrosTipos);

                foreach ($obras as $obra) {

                    switch ($obra->id_tipo_obra){
                        case 1:
                            $datos[0]["cantidad"]++;
                            break;
                        case 2:
                            $datos[1]["cantidad"]++;
                            break;
                        default:
                            $datos[2]["cantidad"]++;

                    }
                    /*if ($obra->id_tipo_obra == $datos[$x]["id"]) {
                        $datos[$x]["cantidad"]++;
                    }
                    else
                        $datos[2]["cantidad"]++;*/


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

                $tecnicos= DB::select("select id_usu, nombre, apellidos where rol= ?",["2"]);

            /*$datos= [
                ["tipo"=>"asignadas",
                    "porcentaje"=>count($obrasAsignadas)*100/count($obras)],
                ["tipo"=>"sin asignar",
                    "porcentaje"=>count($obrasSinAsignar)*100/count($obras)],

            ];*/
        }

        return $datos;
    }
}
