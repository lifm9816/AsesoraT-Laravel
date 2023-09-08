<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class luiscontroller extends Controller
{
    public function guardar_datos(Request $request)
    {
        $this->validate($request,
        [
            'nombre'=>'regex:/^[A-Z][a-zA-Z]+$/',
            'aPaterno' =>'regex: /^[A-Z][a-zA-Z]+$/',
            'aMaterno' =>'regex: /^[A-Z][a-zA-Z]+$/',
            'telefono' => 'regex: /^[\d]{3})\s([\d]{3})\s([\d]{4}'
        ]);
        echo "Usuario registrado con éxito";
        echo "<br>";
        echo "<br>";

        $nombre = $request -> nombre;
        $aPaterno = $request -> aPaterno;
        $aMaterno = $request -> aMaterno;
        $telefono = $request -> telefono;
        $estado = $request->estado;

        echo "Nombre: ";
        echo $nombre;    echo "<br>";

        echo "Apellido paterno: ";
        echo $aPaterno;    echo "<br>";

        echo "Apellido materno: ";
        echo $aMaterno;    echo "<br>";

        echo "Teléfono:";
        echo $telefono;    echo "<br>";

        echo "Estado: ";
        echo $estado;
    }
}
