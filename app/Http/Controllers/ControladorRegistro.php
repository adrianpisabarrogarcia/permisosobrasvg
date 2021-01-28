<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío


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
        $dni = $request->get('dni');
        $email = $request->get('email');
        $datosDni = DB::select('select dni from usuarios where dni = ?',[$dni]);
        $datosEmail = DB::select('select email from usuarios where email = ?',[$email]);
        $errores = '';
        if (count($datosDni)>0){
            $errores = $errores . 'El DNI no es válido. Escribe otro.<br>';
        }
        if (count($datosEmail)>0){
            $errores = $errores . 'El correo no es válido. Escribe otro.';
        }

        if (empty($errores)){
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
                'password' => Hash::make($request->get('password')),
                'rol' => '3'
            ]);

            $this->contact($request);

            Session::put('usuario',$request->get('dni'));
            Session::put('rol','3');
            Session::put('nombre',$request->get('nombre'));

            return redirect()->route('portal.index');
        }
        return view("login.registro", ['errores' => $errores]);



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
        $subject = "Bienvenido/a ". $request['nombre']; //asunto
        $for = $request['email']; //a quien se lo voy a enviar
                      //vista          //le paso los datos del request
        Mail::send('emails.register',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz)"); //de quien
            $msj->subject($subject);
            $msj->to($for);
        });
        //return redirect()->back();
    }
}







