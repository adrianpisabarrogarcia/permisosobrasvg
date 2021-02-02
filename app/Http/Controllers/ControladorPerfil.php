<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Mail;

class ControladorPerfil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function usuarioSesion(){
        $dni= Session::get("usuario");
        $usuario= DB::select("select * from usuarios where dni= ?", [$dni]);
        return $usuario;
    }
    public function show()
    {
        if (!Session::exists('usuario')) {
            return redirect()->route("login.home");
        }
        else{
            $usuario= $this->usuarioSesion();
            return view("principal.perfil")->with("usuario",$usuario);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDatos(Request $request)
    {
        $verificarCorreo=DB::select("select email from usuarios where email=? and dni!= ? ", [$request->email, $request->dni]);
        if(count($verificarCorreo)> 0){
            $error="error";
            $usuario= $this->usuarioSesion();

            return view("principal.perfil")->with(["error"=>$error,"usuario"=>$usuario]);
        }
        DB::update("update usuarios set nombre= ?, apellido= ?, email= ?,telefono= ?, calle= ?, codigo_postal= ?, municipio= ?, provincia= ? where dni= ?", [$request->nombre, $request->apellido, $request->email, $request->telefono, $request->direccion, $request->cp,$request->municipio, $request->provincia, Session::get("usuario")]);
        Session::put('nombre',$request->nombre);
        return redirect()->route("perfil");
    }

    public function updatePassword(Request $request){
        DB::update("update usuarios set password = ?  where dni= ?",[Hash::make($request->contra), Session::get("usuario")]);
        $this->contactousuario($request);
        return redirect("perfil");
    }

    public function contactousuario($request){
        $usuario = DB::select('select email from usuarios where id_usu = ?',[Session::get('id')]);
        $subject = "Restablecer contraseña";
        $for = $usuario[0]->email;
        Mail::send('emails.contramodificada',$request->all(), function($msj) use($subject,$for){
            $msj->from("developersweapp@gmail.com","Permisos y Obras (Vitoria-Gasteiz)");
            $msj->subject($subject);
            $msj->to($for);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        DB::delete("delete from usuarios where dni= ?",[Session::get("usuario")]);
        Session::remove("usuario");
        return "borrado";
    }
}
