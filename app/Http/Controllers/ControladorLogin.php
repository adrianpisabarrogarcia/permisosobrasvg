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
    public function show(Request $request)
    {
        //Recogemos los datos
        $dni = $request->get('dni');
        $password = $request->get('password');

        //Consultamos a la bd
        $datos = DB::select('select * from usuarios where dni= ?', [$dni]);
        //En caso de que encuentre un objeto guardaremos el dni
        if ($datos != null) {
            if (Hash::check($password, $datos[0]->password)) {
                Session::put('usuario', $dni);
                Session::put('id', $datos[0]->id_usu);
                Session::put('rol', $datos[0]->rol);
                Session::put('nombre', $datos[0]->nombre);
                return redirect()->route('portal.index');
            }
        }

        return view('login.index', [
            'error' => 'Usuario o contraseña incorrecto',
        ]);

    }
}
