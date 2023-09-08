<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\Abogados;
use App\Models\administradores;
use Session;


use Illuminate\Http\Request;

class AsesoraTLogin extends Controller
{
    public function login()
    {
        return view("AsesoraT.login");
    }

    public function validar_cuenta(Request $request)
    {
        $this -> validate($request, [
            "correo" => "required|email",
            "contraseña" => "required"
        ]);

        $cont = md5($request -> contraseña);
        $consulta = cliente::where("correo", "=", $request -> correo)
        -> where("contraseña", "=", $cont)
        -> get();

        $cuantos = count($consulta);
        if($cuantos != 0)
        {
            Session::put("Nombre", $consulta[0] -> nombre);
            Session::put("ID", $consulta[0] -> id);
            Session::put("Correo", $consulta[0] -> correo);

            return redirect() -> route("main");
        }

        $consulta2 = Abogados::where("correo", "=", $request -> correo)
        -> where("contraseña", "=", $cont)
        -> get();

        $cuantos2 = count($consulta2);
        if($cuantos2 != 0)
        {
            Session::put("Nombre", $consulta2[0] -> nombre);
            Session::put("ID", $consulta2[0] -> id);
            Session::put("Correo", $consulta2[0] -> correo);

            return redirect() -> route("main");
        }

        $consulta3 = administradores::where("correo", "=", $request -> correo)
        -> where("contraseña", "=", $cont)
        -> get();

        $cuantos3 = count($consulta3);
        if($cuantos3 != 0)
        {
            Session::put("Nombre", $consulta3[0] -> nombre);
            Session::put("ID", $consulta3[0] -> id);
            Session::put("Correo", $consulta3[0] -> correo);

            return redirect() -> route("main");
        }
        else
        {
            Session::flash("mensaje", "El usuario o la contraseña son incorrectos");
            return redirect() -> route("login");
        }
    }

    public function cerrar_sesion()
    {
        Session::forget("Nombre");
        Session::forget("ID");
        Session::forget("Correo");
        Session::flush();

        return view("AsesoraT.main");
    }
}
