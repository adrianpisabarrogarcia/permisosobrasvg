<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControladorPortal extends Controller
{
    public function index(){
        if (!Session::exists('usuario')){
            return redirect()->route('login.home');
        }

        $solicitudes = DB::table('obras')->paginate(4);
        return view('principal.portal')->with('listasolicitudes',$solicitudes);
    }

    public function logout(){
        Session::remove('usuario');

        return redirect()->route('login.home');
    }
}
