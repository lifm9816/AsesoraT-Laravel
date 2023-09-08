<?php

namespace App\Http\Controllers;
use App\Models\categorias;
use App\Models\tipos;
use App\Models\productos;
use App\Models\clientes;

use Session;

use Illuminate\Http\Request;

class productoscontroller extends Controller
{
    public function altaproducto()
    {
        $categorias = categorias::all();
        $tipos = tipos::all();
        $idpactual = productos::orderby('idp', 'desc')->take(1)->get();

        $idpnuevo =$idpactual[0]->idp+1;

        return view('Sistemas.alta_producto')
        ->with('categorias', $categorias)
        ->with('tipos', $tipos)
        ->with('idpnuevo',$idpnuevo);

        Session::flash('mensaje', "El registro $request->nombre ha sido dado de alta correctamente");
        return redirect()->route('reporte');
    }

    public function almacenaproducto(Request $request)
    {
        //return($request);
        $this->validate($request, [
            'nombre' => 'regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'cantidad' => 'required|numeric|integer',
            'costo' => 'required|numeric',
            'idc' => 'required',
            'idt' => 'required',
        ]);
        $productos = new productos;
        $productos -> idp = $request ->idp;
        $productos -> nombre = $request -> nombre;
        $productos -> cantidad = $request -> cantidad;
        $productos -> costo = $request -> costo;
        $productos -> idc = $request -> idc;
        $productos -> idt = $request -> idt;
        $productos -> activo = $request -> activo;
        $productos -> save();

        //return('Listo para guardar');
        Session::flash('mensaje', "El registro $request->nombre ha sido modificado correctamente");
        return redirect()->route('reporte');
    }

    public function guardacambios(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'nombre' => 'regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'cantidad' => 'required|numeric|integer',
            'costo' => 'required|numeric',
            'idc' => 'required',
            'idt' => 'required',
        ]);
        $productos = productos::find($request->idp);
        $productos -> idp = $request ->idp;
        $productos -> nombre = $request -> nombre;
        $productos -> cantidad = $request -> cantidad;
        $productos -> costo = $request -> costo;
        $productos -> idc = $request -> idc;
        $productos -> idt = $request -> idt;
        $productos -> activo = $request -> activo;
        $productos -> save();

        return('Registro modificado correctamente');
    }

    public function reporte()
    {
        $productos = \DB::table("productos")
        -> join("categorias", "categorias.idc", "=", "productos.idc")
        -> select("productos.idp","productos.nombre", "productos.cantidad", "productos.costo", "categorias.nombre as catego")
        -> get();
        //$productos = \DB::select("select p.nombre, p.cantidad, p.costo, c.Nombre
        //from productos as p
        //inner join categorias as c on c.idc = p.idc");
        return view("Sistemas.reporte_productos")->with("productos", $productos);
    }

    public function modificaproducto($idp)
    {
        $categorias = categorias::all();
        $tipos = tipos::all();

        $productos = \DB::table('productos')
        ->join('categorias', 'categorias.idc', '=', 'productos.idc')
        ->join('tipos', 'tipos.idt', '=', 'productos.idt')
        ->select('productos.idp', 'productos.nombre', 'productos.cantidad','productos.activo',
        'productos.costo', 'categorias.nombre as catego', 'categorias.idc', 
        'tipos.nombre as tipoprod', 'tipos.idt')
        ->where('productos.idp', '=', $idp)
        ->get();

        $idctengo = $productos[0]->idc;
        $idttengo = $productos[0]->idt;
        $categorias = categorias::where('idc', '!=', $idctengo)->get();
        $tipos = tipos::where('idt', '!=', $idttengo)->get();
        
        //return $productos;

        return view("Sistemas.modificaproducto")
        ->with('productos', $productos[0])
        ->with('categorias', $categorias)
        ->with('tipos', $tipos);
    }
}
