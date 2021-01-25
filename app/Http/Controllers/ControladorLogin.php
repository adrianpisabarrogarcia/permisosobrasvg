<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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
        $datos = DB::select('select * from usuarios where dni= ?',[$dni]);
        //En caso de que encuentre un objeto guardaremos el dni
        if ($datos != null)
        {
            if (Hash::check($password, $datos[0]->password)){
                Session::put('usuario',$dni);
                Session::put('rol','3');
                foreach ($datos as $dato){
                    Session::put('nombre',$dato->nombre);
                }
                return redirect()->route('portal.index');
            }
        }

        $datos = DB::select('select * from empleados where dni = ?',[$dni]);

        if ($datos == null){
            //Error
            return view('login.index',[
                'error' => 'Usuario o contraseña incorrecto',
            ]);
        }
        else
        {
            if (Hash::check($password, $datos[0]->password)){
                //Entrar al portal
                Session::put('usuario',$dni);
                foreach ($datos as $dato){
                    Session::put('rol',$dato->rol);
                    Session::put('nombre',$dato->nombre);
                }
                return redirect()->route('portal.index');
            }else{
                //Error
                return view('login.index',[
                    'error' => 'Usuario o contraseña incorrecto' . var_dump($datos),
                ]);
            }
        }
    }
}
