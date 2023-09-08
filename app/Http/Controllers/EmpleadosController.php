<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function saludo($nombre, $dias)
    {
        $pago = 100;
        $nomina = $dias * $pago;
        //return view('empleado', compact('nombre','dias'));
        //return view("empleado", ['nombrex' => $nombre, 'dias' => $dias]);
        return view("empleado")
        ->with("nombre", $nombre)
        ->with("dias", $dias)
        ->with("nomina", $nomina);
    }

    public function salir()
    {
        return "Salir";
    }

    public function mensaje()
    {
        return "Hola trabajador";
    }

    public function pago()
    {
        $dias = 7;
        $pago = 600;
        $nomina = $dias * $pago;
        return "El pago total del empleado es: $nomina";
    }

    public function nomina($dias, $pago)
    {
        $nomina = $dias * $pago;
        dd($nomina, $dias, $pago);
        return "El pago total del empleado es: $nomina";
    }
}
