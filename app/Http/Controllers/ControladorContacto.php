<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
class ControladorContacto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->correoUsuario($request);
        $this->correoAdmin($request);
        return redirect()->route("portal.index");
    }
    public function correoUsuario($request){
        $subject="Solicitud de obra creada.";
        $for= $request->email;
        Mail::send('emails.contactousuario',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras VG");
            $msj->subject($subject);
            $msj->to($for);
        });
    }
    public function correoAdmin($request){
        $subject="Solicitud de obra creada.";
        $for= "developersweapp@gmail.com";
        Mail::send('emails.contactoconcliente',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras VG");
            $msj->subject($subject);
            $msj->to($for);
        });
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
    public function show()
    {
        $dni = Session::get('usuario');
        $datos = DB::select('select * from usuarios where dni = ?',[$dni]);
        $nombre = $datos[0]->nombre . ' ' . $datos[0]->apellido;
        $email = $datos[0]->email;
        return view("contacto")->with(['nombre'=>$nombre,'email'=>$email]);
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
