<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Mail;

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
        //mostrar vista de registro
        return view('login.registro');
    }

    public function restablecer(){
        //mostrar vista de reestablecer la contraseña
        return view('login.restablecercontra');
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
    //autentical el email
    public function authemail(Request $request){
        $usuario = DB::select('select * from usuarios where email = ?',[$request->correo]);
        if ($usuario == null){
            return view('login.restablecercontra',['error' => 'Cuenta de correo incorrecta']);
        }
        else
        {
            //envio de correo
            $this->correo($request);
            return view('login.codigo');
        }
    }

    public function correo($request){
        $subject = "Restablecer contraseña";
        $for = $request->correo;

        $numero = "";

        for ($x = 0; $x <5;$x++){
            $numero .= mt_rand(0,9);
        }

        $numeroale = ['numero' => $numero];

        Session::put('numerocontra',$numero);
        Session::put('email',$request->correo);

        Mail::send('emails.restablecercontra',$numeroale, function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz)");
            $msj->subject($subject);
            $msj->to($for);
        });
    }

    public function authcodigo(Request $request){
        if ($request->codigo != Session::get('numerocontra')){
            return view('login.codigo',['error' => 'Codigo de verificación incorrecto']);
        }
        else
            return view('login.contraseña');
    }

    //metodo para modificar la contraseña
    public function modificarcontra(Request $request){
        DB::update('update usuarios set password = ? where email = ?',[Hash::make($request->passnew),Session::get('email')]);
        $this->modcontra($request);
        Session::remove('numerocontra');
        Session::remove('email');
        return redirect()->route('login.home');
    }

    public function modcontra($request){
        $subject = "Restablecer contraseña";
        $for = Session::get('email');

        Mail::send('emails.contramodificada',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz)");
            $msj->subject($subject);
            $msj->to($for);
        });
    }
}
