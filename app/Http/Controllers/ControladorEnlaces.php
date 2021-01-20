<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControladorEnlaces extends Controller
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
    //Enlaces generales
    public function solicitarObra(){
        return view("solicitarObra");
    }
    public function contacto(){
        return view("contacto");
    }
    public function consultarUsuarios(){
        return view("tablaUsuarios");
    }
    //Enlaces para las funciones del coordinador.
    public function asignarSolicitudes(){
        return view("coordinador.asignarSolicitudes");
    }
    public function comprobarSolicitudes(){
        return view("coordinador.comprobarSolicitudes");
    }
    public function verGraficos(){
        return view("coordinador.graficos");
    }
    public function consultarEmpleados(){
        return view("coordinador.tablaEmpleados");
    }

    //Enlaces para las funciones del tecnico.



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
