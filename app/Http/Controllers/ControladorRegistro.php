<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío
use DB;

class ControladorRegistro extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //utilizar este método para guardar la info recibida por parámetro
        DB::table('usuarios')->insert([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellidos'),
            'dni' => $request->get('dni'),
            'fecha_nac' => $request->get('fecha_nac'),
            'lugar_nac' => $request->get('lugar_nac'),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'calle' => $request->get('calle'),
            'codigo_postal' => $request->get('codigopostal'),
            'municipio' => $request->get('municipio'),
            'provincia' => $request->get('provincia'),
            'password' => $request->get('password')
        ]);

        $this->contact($request);
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

    public function contact(Request $request){
        $subject = "Bienvenido/a ". $request['nombre'];
        $for = $request['email'];
        Mail::send('emails.register',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz)");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }
}







