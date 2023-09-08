<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use Session;

class ASLogin extends Controller
{
    public function login()
    {
        return view("AsesoraT.login");
    }

    public function valida(Request $request)
    {
      $this->validate($request,[
        'correo'=>'required|email',
        'password'=>'required'
      ]);
      $psw = md5($request->password);
      $consulta = users::where('correo','=',$request->correo)
                        ->where('password','=',$psw)
                        ->where('activo','=',"si")
                        ->get();
      $cuantos = count($consulta);
      if($cuantos!=0)
      {
        Session::put('sesionname', $consulta[0]->nombre);
        Session::put('sesionidu', $consulta[0]->idu);

        /*$sname = Session::get('sesionname');
        $sidu = Session::get('sesionidu');
        $stipo = Session::get('sesiontipo');
        return $sname . ' '.$sidu . ' '. $stipo;*/

        return redirect()->route('reporte');
      }
      else 
      {
        Session::flash('error','El usuario o el password no son correctos o el usuario no existe');
        return redirect()->route('login');
      }
    }

    public function validarcliente(Request $request)
    {
        $this -> validate($request, [
            "correo" => "required|email",
            "contraseña" => "required"
        ]);

        $cont = md5($request -> contraseña);
        $consulta = cliente::where("correo", "=", $request -> correo)
        -> where("contraseña", "=", $request -> cont)
        -> get();

        $cuantos = count($consulta);

        if($cuantos != 0)
        {
            Session::put('sesionname', $consulta[0]->nombre);
            Session::put('sesionidu', $consulta[0]->id_cliente);
            return redirect()->route('main');
        }
        else
        {
          
        }
        
    }
}
