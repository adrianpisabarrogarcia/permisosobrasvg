<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;

class ControladorCrearUsuarios extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dni = $request->get('dni');
        $email = $request->get('email');
        $datosDni = DB::select('select dni from usuarios where dni = ?', [$dni]);
        $datosEmail = DB::select('select email from usuarios where email = ?', [$email]);
        $errores = '';
        if (count($datosDni) > 0) {
            $errores = $errores . 'El DNI no es válido, ya existe un usuario con ese DNI. Borra primero el otro usuario.<br>';
        }
        if (count($datosEmail) > 0) {
            $errores = $errores . 'El correo no es válido, ya existe un usuario con ese corro electrónico. Escribe otro correo diferente.';
        }
        if (empty($errores)) {
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
                'rol' => $request->get('tipousuario')
            ]);
        }
        $this->contact($request);
        return $this->show();
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("principal.coordinador.creacionUsuarios");
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
