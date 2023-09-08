<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class elizabethcontroller extends Controller
{
  public function guardardatos(Request $request)
  {
    $this->validate($request,[
      'lector'=>'regex:/^[A-Z]{6}[.][A-Z,0-9]{8}[_][0-9]{4}$/',
      'clave'=>'regex:/^[0-9,A-Z]{2}[.][0-9,A-Z]{4}[.][0-9]{3}[_][A-Z,0-9]{3}$/',
      'sueldo'=>'regex:/^[0-9]+[.][0-9]{2}$/',


    ]);
    echo "EL EMPLEADO FUE REGISTRADO CORRECTAMENTE";
    echo "<br>";
    echo "<br>";

    $lector = $request->lector;
    $clave = $request->clave;
    $sueldo = $request->sueldo;
    $idg = $request->idg;
    $ida = $request->ida;
    $comentarios = $request->comentarios;

    echo "Clave de lector: ";
    echo $lector;    echo "<br>";

    echo "Clave de empleado: ";
    echo $clave;    echo "<br>";

    echo "Sueldo: ";
    echo $sueldo;    echo "<br>";

    echo "Género:";
    echo $idg;    echo "<br>";

    echo "Área: ";
    echo $ida;    echo "<br>";

    echo "Comentarios: ";
    echo $comentarios;

  }


  public function formularioExam(){
    return view('formularioExam');
  }

}
