<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;

class ControladorContacto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //solo lo mostraré si soy un usuario solicitante
        if (!Session::exists('usuario') || Session::get('rol') != "3")
            return redirect()->route('login.home');
        else
        {
            //muestro los datos del usuario conectado
            $dni = Session::get('usuario');
            $datos = DB::select('select * from usuarios where dni = ?',[$dni]);
            $nombre = $datos[0]->nombre;
            $email = $datos[0]->email;
            return view("principal.usuarios.contacto")->with(['nombre'=>$nombre,'email'=>$email]);
        }
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
    public function show(Request $request)
    {
        //muestro la vista
        $this->correoUsuario($request);
        $this->correoAdmin($request);
        return redirect()->route("portal.index");
    }

    //envío el correo electrónico al usuario
    public function correoUsuario($request){
        $subject="Permisos y Obras VG";
        $for= $request->email;
        Mail::send('emails.contactousuario',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras VG");
            $msj->subject($subject);
            $msj->to($for);
        });
    }
    //envío el correo electrónico al administrador
    public function correoAdmin($request){
        $subject="Permisos y Obras VG";
        $for= "developersweapp@gmail.com";
        Mail::send('emails.contactoconcliente',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras VG");
            $msj->subject($subject);
            $msj->to($for);
        });
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
