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

    public function solicitarObra(){
        return view("coordinador.solicitarObra");
    }
    public function contacto(){
        return view("contacto");
    }
    public function asignarSolicitudes(){
        return view("asignarSolicitudes");
    }
    public function comprobarSolicitudes(){
        return view("comprobarSolicitudes");
    }
    public function verGraficos(){
        return view("graficos");
    }
    public function consultarEmpleados(){
        return view("tablaEmpleados");
    }
    public function consultarUsuarios(){
        return view("tablaUsuarios");
    }


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
