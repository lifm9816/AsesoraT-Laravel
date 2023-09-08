<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorias;
use App\Models\Tipos;
use App\Models\productos;
use App\Models\clientes;

class pruebacontroller extends Controller
{
    public function consultas()
    {
      //$consulta1 = tipos::where('idt', '=', 1)->get();
      //$consulta1 = productos::where('idt', "=", 1)->where('cantidad', '<=', 10)->get();
      //return $consulta1;

      $consulta2 = clientes::where('idcl', "=", 1)->get();
      return $consulta2;

      //$consulta1 = productos::where('costo', '<=', 100)

    }

    public function guardaproducto(Request $request)
    {
      $this->validate($request,[
        'nombre'=>'regex:/^[A-Z,Á,É,Í,Ó][a-z,A-Z, ,á,é,í,ó,Á,É,Í,Ó,Ú]+$/',
        'costo'=>'regex:/^[0-9]+[.][0-9]{2}$/',
        'correo'=>'require|email',
      ]);
      echo "DATOS CORRECTOS";

      /*dd ($request); Opción 3
       Opción 1
      $nombre = $request->nombre;
      $costo = $request->costo;
      $ids = $request->ids;
      $idca = $request->idca;
      $descripcion = $request->descripcion;
      echo "Descripción: ";
      echo $descripcion;
      echo "<br>"; echo "idca:";
      echo $idca;
      echo "<br>"; echo "ids: ";
      echo $ids;
      echo "<br>"; echo "Costo: ";
      echo $costo;
      echo "<br>"; echo "Nombre: ";
      echo $nombre;*/

      /* Opción 2
      return $request; */
    }

    public function Suma(){
      $x = 5;
      $y = 6;
      $suma = $x+$y;
      echo "la suma es: ".$suma;
    }

    public function practabla(){
      return view('tabla');
    }

    public function fotoOwo(){
      return view('cargafoto');
    }

    public function estilos(){
      return view('estilos');
    }

    public function formulario(){
      return view('formulario');
    }
}
