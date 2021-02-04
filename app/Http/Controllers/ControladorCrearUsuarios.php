<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\Session;

use function Symfony\Component\Translation\t;
class ControladorCrearUsuarios extends Controller
{
    public function store(Request $request)
    {
        $dni = $request->get('dni');
        $email = $request->get('email');
        $datosDni = DB::select('select dni from usuarios where dni = ?', [$dni]);
        $datosEmail = DB::select('select email from usuarios where email = ?', [$email]);
        $errores = '';
        if (count($datosDni) > 0) {
            $errores = $errores . 'Ya existe un usuario con ese DNI<br>';
        }
        if (count($datosEmail) > 0) {
            $errores = $errores . 'Ya existe un usuario con ese corro electrónico';
        }

        if ($errores == '') {
            //utilizar este método para guardar la info recibida por parámetro
            if ($request->get('tipousuario')!=2){
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
                    'rol' => $request->get('tipousuario')
                ]);
            }else{
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
                    'rol' => $request->get('tipousuario'),
                    'estado_tecnico' => 'alta'
                ]);
            }
            $this->contact($request);
            return $this->show('Se ha creado el usuario correctamente');
        }
        return view("principal.coordinador.creacionUsuarios")->with(['errores'=>$errores]);
    }

    public function show($hecho = '')
    {
        if (!Session::exists('usuario') || Session::get('rol') != "1"){
            return redirect()->route('login.home');
        }
        return view("principal.coordinador.creacionUsuarios")->with(['hecho'=>$hecho]);
    }

    public function contact(Request $request)
    {
        $subject = "Bienvenido/a " . $request['nombre']; //asunto
        $for = $request['email']; //a quien se lo voy a enviar
        //vista          //le paso los datos del request
        Mail::send('emails.register', $request->all(), function ($msj) use ($subject, $for) {
            $msj->from("developersweapp@gmail.com", "Permisos y Obras (Vitoria-Gasteiz)"); //de quien
            $msj->subject($subject);
            $msj->to($for);
        });
        //return redirect()->back();
    }
}
