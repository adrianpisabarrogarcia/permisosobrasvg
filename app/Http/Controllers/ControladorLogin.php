<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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

        public function show(Request $request){
            $dni = $request->get('dni');
            $password = $request->get('password');

            $datos = DB::select('select * from usuarios where dni= ? and password = ?',[$dni,$password]);
            if ($datos != null)
            {
                $usuario = session($dni);
                $rol = session('3');
                return view('/portal');
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
                $usuario = session($dni);
                $rol = session($datos->rol);
                return view('/portal');
            }
        }
}
