<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorLogin extends Controller
{
    //Metodo que se utiliza para retornar la vista del index principal
    public function index()
    {
        return view('login.index');
    }

    //Metodo que se utiliza para retornar la vista del registro del login
    public function registro()
    {
        return view('login.registro');
    }

    //Metodo para comprobar los datos del login
    public function show(Request $request){
        //Recogemos los datos
        $dni = $request->get('dni');
        $password = $request->get('password');

        //Consultamos a la bd
        $datos = DB::select('select * from usuarios where dni= ? and password = ?',[$dni,$password]);
        //En caso de que encuentre un objeto guardaremos el dni
        if ($datos != null)
        {
            Session::put('usuario',$dni);
            Session::put('rol','3');
            foreach ($datos as $dato){
                Session::put('nombre',$dato->nombre);
            }
            return redirect()->route('portal.index');
        }

        $datos = DB::select('select * from empleados where dni = ? and password = ?',[$dni,$password]);
        if ($datos == null){
            //Error
            return view('login.index',[
                'error' => 'Usuario o contraseña incorrecto',
            ]);
        }
        else
        {
            Session::put('usuario',$dni);
            foreach ($datos as $dato){
                Session::put('rol',$dato->rol);
                Session::put('nombre',$dato->nombre);
            }

            return redirect()->route('portal.index');
        }
    }
}
