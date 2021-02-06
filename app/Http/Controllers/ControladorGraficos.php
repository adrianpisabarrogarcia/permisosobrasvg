<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorGraficos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //compruebo si soy coordianador
        if (!Session::exists('usuario') || Session::get('rol') != "1")
        {
            return redirect()->route('login.home');
        }
        return view("principal.coordinador.graficos");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($filtro, Request $request)
    {
        //segun el filtro voy a recoger los datos
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

                //carga general de solicitudes
                $obrasSinAsignar = DB::select("select id_obra, id_tipo_obra, estado, fecha_creacion from obras where id_tecnico is null");

                $obrasAsignadas = DB::select("select id_obra, id_tipo_obra, estado, fecha_creacion, id_tecnico from obras where id_tecnico is not null");


                //carga individual

                $tecnicos= DB::select("select id_usu, nombre, apellido from usuarios where rol = ?",["2"]);
                $lista= $this->cargaGeneralDatos($tecnicos);

                $datos= [
                    ["tipo"=>"asignadas",
                        "porcentaje"=>count($obrasAsignadas)*100/count($obras)],
                    ["tipo"=>"sin asignar",
                        "porcentaje"=>count($obrasSinAsignar)*100/count($obras)],
                    "listaTecnicos"=>$lista
                ];

                if($request->valor == "general"){
                    $lista= $this->cargaGeneralDatos($tecnicos);

                    $datos= [
                        ["tipo"=>"asignadas",
                            "porcentaje"=>count($obrasAsignadas)*100/count($obras)],
                        ["tipo"=>"sin asignar",
                            "porcentaje"=>count($obrasSinAsignar)*100/count($obras)],
                        "listaTecnicos"=>$lista
                    ];
                }
                else{
                    $obrasAceptadas=0;
                    $obrasRechazadas=0;
                    $obrasPendientes=0;
                    $objeto= [
                        "enero"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "febrero"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "marzo"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "abril"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "mayo"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "junio"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "julio"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "agosto"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "septiembre"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "octubre"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "noviembre"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ],
                        "diciembre"=>[
                            "pendiente"=>$obrasPendientes,
                            "aceptados"=>$obrasAceptadas,
                            "rechazados"=>$obrasRechazadas
                        ]
                    ];
                    foreach ($obrasAsignadas as $obra){

                        foreach ($tecnicos as $tecnico) {


                            if($obra->id_tecnico == $request->valor && $request->valor == $tecnico->id_usu){

                                switch (date("F", strtotime($obra->fecha_creacion))) {
                                    case "January":
                                        //$this->switchEstadoObras($obra, $objeto["enero"]["aceptados"], $objeto["enero"]["rechazados"], $objeto["enero"]["pendiente"]);
                                        /*$objeto["enero"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["enero"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["enero"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["enero"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["enero"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["enero"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "February":
                                        //$this->switchEstadoObras($obra,  $objeto["febrero"]["aceptados"], $objeto["febrero"]["rechazados"], $objeto["febrero"]["pendiente"]);
                                        /*$objeto["febrero"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["febrero"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["febrero"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["febrero"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["febrero"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["febrero"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "March":
                                        //$this->switchEstadoObras($obra, $objeto["marzo"]["aceptados"], $objeto["marzo"]["rechazados"], $objeto["marzo"]["pendiente"]);
                                        /*$objeto["marzo"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["marzo"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["marzo"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["marzo"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["marzo"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["marzo"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "April":
                                        // $this->switchEstadoObras($obra, $objeto["abril"]["aceptados"], $objeto["abril"]["aceptados"], $objeto["abril"]["pendiente");
                                        /*$objeto["abril"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["abril"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["abril"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["abril"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["abril"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["abril"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "May":
                                        //$this->switchEstadoObras($obra, $objeto["mayo"]["aceptados"], $objeto["mayo"]["rechazados"], $objeto["mayo"]["pendiente"]);
                                        /*$objeto["mayo"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["mayo"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["mayo"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["mayo"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["mayo"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["mayo"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "June":
                                        // $this->switchEstadoObras($obra,$objeto["junio"]["aceptados"], $objeto["junio"]["rechazados"], $objeto["junio"]["pendiente"]);
                                        /*$objeto["junio"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["junio"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["junio"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["junio"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["junio"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["junio"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "July":
                                        //  $this->switchEstadoObras($obra, $objeto["julio"]["aceptados"], $objeto["julio"]["rechazados"], $objeto["julio"]["pendiente"]);
                                        /* $objeto["julio"]["aceptados"]= $contadorObras["aceptado"];
                                         $objeto["julio"]["rechazados"]= $contadorObras["rechazado"];
                                         $objeto["julio"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["julio"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["julio"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["julio"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "August":
                                        // $this->switchEstadoObras($obra, $objeto["agosto"]["aceptados"], $objeto["agosto"]["rechazados"], $objeto["agosto"]["pendiente"]);
                                        /*$objeto["abril"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["abril"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["abril"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["agosto"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["agosto"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["agosto"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "September":
                                        // $this->switchEstadoObras($obra, $objeto["septiembre"]["aceptados"], $objeto["septiembre"]["rechazados"], $objeto["septiembre"]["pendiente"]);
                                        /* $objeto["septiembre"]["aceptados"]= $contadorObras["aceptado"];
                                         $objeto["septiembre"]["rechazados"]= $contadorObras["rechazado"];
                                         $objeto["septiembre"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["septiembre"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["septiembre"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["septiembre"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "October":
                                        // $this->switchEstadoObras($obra,$objeto["octubre"]["aceptados"], $objeto["octubre"]["rechazados"], $objeto["octubre"]["pendiente"]);
                                        /*$objeto["octubre"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["octubre"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["octubre"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["octubre"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["octubre"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["octubre"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "November":
                                        //$this->switchEstadoObras($obra,$objeto["noviembre"]["aceptados"], $objeto["noviembre"]["rechazados"], $objeto["noviembre"]["pendiente"]);
                                        /* $objeto["noviembre"]["aceptados"]= $contadorObras["aceptado"];
                                         $objeto["noviembre"]["rechazados"]= $contadorObras["rechazado"];
                                         $objeto["noviembre"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["noviembre"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["noviembre"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["noviembre"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                    case "December":
                                        // $this->switchEstadoObras($obra,$objeto["enero"]["aceptados"], $objeto["enero"]["rechazados"], $objeto["enero"]["pendiente"]);
                                        /*$objeto["diciembre"]["aceptados"]= $contadorObras["aceptado"];
                                        $objeto["diciembre"]["rechazados"]= $contadorObras["rechazado"];
                                        $objeto["diciembre"]["pendiente"]= $contadorObras["pendiente"];*/
                                        switch ($obra->estado){
                                            case "aceptado":
                                                $objeto["diciembre"]["aceptados"]++;
                                                break;
                                            case "rechazado":
                                                $objeto["diciembre"]["rechazados"]++;
                                                break;
                                            case "pendiente":
                                                $objeto["diciembre"]["pendiente"]++;
                                                break;
                                        }
                                        break;
                                }



                                $datos= $objeto;
                                //array_push($datos, $objeto);
                            }

                        }
                    }
                }

        }

        return $datos;
    }
    public function cargaGeneralDatos($tecnicos){
        $listatecnicos=[];
        foreach ($tecnicos as $infoTecnico){
            $infoTecnico=[
                "id"=>$infoTecnico->id_usu,
                "nombre"=>$infoTecnico->nombre,
                "apellido"=>$infoTecnico->apellido,

            ];
            array_push($listatecnicos,$infoTecnico);
        }
        return $listatecnicos;

    }
    public function switchEstadoObras($obra, $obrasAceptadas, $obrasRechazadas, $obrasPendientes){

        switch ($obra->estado){
            case "aceptado":
                $obrasAceptadas++;
                break;
            case "rechazado":
                $obrasRechazadas++;
                break;
            case "pendiente":
                $obrasPendientes++;
                break;
        }
        $sumatorioObras= [
            "aceptado"=>$obrasAceptadas,
            "rechazado"=>$obrasRechazadas,
            "pendiente"=>$obrasPendientes
        ];


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
