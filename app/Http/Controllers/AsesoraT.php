<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\cliente;
use App\Models\Abogados;
use App\Models\especialidades;
use App\Models\tipo_asesoria;
use App\Models\tipo_tramites;
use App\Models\citas;
use App\Models\administradores;
use Session;



class AsesoraT extends Controller
{

    public function main()
    {
        return view("AsesoraT.main");
    }

    public function main2()
    {
        return view("AsesoraT.main2");
    }

    public function inicio()
    {
        return view("AsesoraT.main");
    }

    public function prueba()
    {
        return view("AsesoraT.Clientes");
    }

    public function registrar_administrador()
    {
        $ID = Session("ID");

        
        if($ID != NULL)
        {
            $idadactual = administradores::orderby("id", "desc") -> take(1) -> get();
            $idadnuevo = $idadactual[0] -> id + 1;

            return view("AsesoraT.Administradores")
            -> with("idadnuevo", $idadnuevo);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function almacena_administrador(Request $request)
    {
        $this -> validate($request, [
            "nombre" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aPaterno" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aMaterno" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "teléfono" => "required|regex:/^[0-9]{10}+$/",
            "correo" => "required|email",
            "Identificación" => "required|mimes:jpg,png,gif,jpeg,pdf",
            "contraseña" => "required",
            "contraseñaconf" => "required|same:contraseña"
        ]);

        $file = $request -> file("Identificación");
        $img = $file -> getClientOriginalName();
        $img2 = $request -> id . $img;
        \Storage::disk("local") -> put($img2, \File::get($file));

        $administrador = new administradores;
        $administrador -> id = $request -> id;
        $administrador -> nombre = $request -> nombre;
        $administrador -> aPaterno = $request -> aPaterno;
        $administrador -> aMaterno = $request -> aMaterno;
        $administrador -> teléfono = $request -> teléfono;
        $administrador -> correo = $request -> correo;
        $administrador -> Identificación = $img2;
        $administrador -> contraseña = md5($request -> contraseña);
        $administrador -> save();

        Session::flash("mensaje", "El administrador ha sido registrado con éxito");
        return redirect()->route("main");
    }

    public function modificar_administrador()
    {
        $ID = Session("ID");
        $Correo = Session("Correo");

        if($ID != NULL)
        {
            
            $consulta = administradores::where("id", "=", $ID) -> get();

            return view("AsesoraT.Modificar_administradores")
            -> with("consulta", $consulta[0]);
        }
        else
        {
            return view("AsesoraT.login");
        }

    }

    public function guardar_cambios_administrador(Request $request)
    {
        $this -> validate($request, [
            "nombre" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aPaterno" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aMaterno" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "teléfono" => "required|regex:/^[0-9]{10}+$/",
            "correo" => "required|email",
            "Identificación" => "mimes:jpg,png,gif,jpeg,pdf"
        ]);

        $file = $request -> file("Identificación");
        if($file != NUll)
        {
            $img = $file -> getClientOriginalName();
            $img2 = $request -> id . $img;
            \Storage::disk("local") -> put($img2, \File::get($file));
        }

        $admin = administradores::withTrashed()->find($request -> id);
        $admin -> id = $request -> id;
        $admin -> nombre = $request -> nombre;
        $admin -> aPaterno = $request -> aPaterno;
        $admin -> aMaterno = $request -> aMaterno;
        $admin -> teléfono = $request -> teléfono;
        $admin -> correo = $request -> correo;
        if($file != NULL)
        {
            $admin -> Identificación = $img2;
        }
        $admin -> save();
        

        Session::flash("mensaje", "Cambios guardados con éxito");
        return redirect()->route("main");
    }

    public function reporte_administrador()
    {
        $ID = Session("ID");
        if($ID != NULL)
        {
            $admin = administradores::withTrashed()
            -> select
            (
                "administradores.id", 
                "administradores.nombre", 
                "administradores.aPaterno", 
                "administradores.aMaterno", 
                "administradores.teléfono", 
                "administradores.correo", 
                "administradores.Identificación",
                "administradores.deleted_at")
            -> where("administradores.id", "!=", "202003000")
            -> where("administradores.id", "!=", $ID)
            -> get();
            return view("AsesoraT.Reporte_administradores")
            -> with("admin", $admin);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function modifica_administrador($id)
    {
        $ID = Session("ID");
        if($ID != NULL)
        {
            $consulta = administradores::where("id", "=", $id) -> get();

            return view("AsesoraT.Modificar_administradores")
            -> with("consulta", $consulta[0]);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function suspende_administrador($id)
    {

        $buscaradministrador = administradores::where("id", $id)->get();
        $cuantos = count($buscaradministrador);
        if($cuantos != 0)
        {
            administradores::withTrashed()->find($id)->delete();

            return redirect() -> route("reporte_administrador")
            -> with("mensaje", "Administrador suspendido con éxito");
        }

    }

    public function activa_administrador($id)
    {
        $admin = administradores::withTrashed()->where("id", $id)->restore();
        return redirect() -> route("reporte_administrador")
        -> with("mensaje", "Administrador reactivado con éxito");
    }

    public function borrar_administrador($id)
    {

        $buscaradministrador = administradores::where("id", $id)->get();
        $cuantos = count($buscaradministrador);
        if($cuantos != 0)
        {
            administradores::withTrashed()->find($id)->forceDelete();

            return redirect() -> route("reporte_administrador")
            -> with("mensaje", "El administrador ha sido eliminado con éxito");
        }

    }

    public function registroespecialidad()
    {
        $ID = Session("ID");

        if($ID != NULL)
        {
            $ideactual = especialidades::orderby("id_especialidad", "desc")->take(1)->get();
            $idenuevo = $ideactual[0] -> id_especialidad + 1;

            return view("AsesoraT.Especialidades")
            ->with("idenuevo", $idenuevo);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function almacenaespecialidad(Request $request)
    {
        $this -> validate($request, [
            "especialidad" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/"
        ]);

        $especialidad = new especialidades;
        $especialidad -> id_especialidad = $request -> id_especialidad;
        $especialidad -> especialidad = $request -> especialidad;
        $especialidad -> save();

        Session::flash("mensaje", "Especialidad guardada con éxito!");
        return redirect()->route("registroespecialidad");
    }

    public function registroasesoria()
    {
        $ID = Session("ID");

        if($ID != NULL)
        {
            $idesactual = tipo_asesoria::orderby("id_asesoria", "desc")->take(1)->get();
            $idesnuevo = $idesactual[0]-> id_asesoria + 1;
        
            return view("AsesoraT.Asesoria")
            ->with("idesnuevo", $idesnuevo);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function almacenaasesoria(Request $request)
    {
        $this -> validate($request, [
            "tipo_asesoria" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/"
        ]);

        $asesoria = new tipo_asesoria;
        $asesoria -> id_asesoria = $request -> id_asesoria;
        $asesoria -> tipo_asesoria = $request -> tipo_asesoria;
        $asesoria -> save();

        Session::flash("mensaje", "Especialidad guardada con éxito!");
        return redirect()->route("registroasesoria");
    }

    public function registrotramite()
    {
        $ID = Session("ID");

        if($ID != NULL)
        {
            $idtactual = tipo_tramites::orderby("id_tramite", "desc") -> take(1) -> get();
            $idtnuevo = $idtactual[0] -> id_tramite + 1;

            return view("AsesoraT.Tramite")
            -> with("idtnuevo", $idtnuevo);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function almacenatramite(Request $request)
    {
        $this -> validate($request, [
            "tipo_tramite" => "required|regex:/^[a-z, A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/"
        ]);

        $tramite = new tipo_tramites;
        $tramite -> id_tramite = $request -> id_tramite;
        $tramite -> tipo_tramite = $request -> tipo_tramite;
        $tramite -> save();

        Session::flash("mensaje", "Especialidad guardada con éxito!");
        return redirect()->route("registrotramite");
    }

    public function registrocliente()
    {

        $idcactual = cliente::withTrashed()->orderby('id', 'desc')->take(1)->get();
        $idcnuevo = $idcactual[0]->id+1;

        return view("AsesoraT.Clientes")
        ->with("idcnuevo", $idcnuevo);
    }

    public function almacenacliente(Request $request)
    {
        $this->validate($request, [
            "nombre" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aPaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aMaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "telefono" => "required|regex:/^[0-9]{10}+$/",
            "correo" => "required|email",
            "Identificación" => "required|mimes:jpg,png,gif,jpeg,pdf",
            "contraseña" => "required",
            "contraseñaconf" => "required|same:contraseña"
        ]);

        $file = $request -> file("Identificación");
        $img = $file -> getClientOriginalName();
        $img2 = $request -> id . $img;
        \Storage::disk("local") -> put($img2, \File::get($file)); 

        $cliente = new cliente;
        $cliente -> id = $request -> id;
        $cliente -> nombre = $request -> nombre;
        $cliente -> aPaterno = $request -> aPaterno;
        $cliente -> aMaterno = $request -> aMaterno;
        $cliente -> telefono = $request -> telefono;
        $cliente -> correo = $request -> correo;
        $cliente -> Identificación = $img2;
        $cliente -> contraseña = md5($request -> contraseña);
        $cliente -> save();



        Session::flash("mensaje", "El cliente ha sido registrado con éxito");
        return redirect()->route("registrocliente");
    }

    public function modificar_cliente()
    {
        $ID = Session("ID");
        $Correo = Session("Correo");

        if($ID != NULL)
        {
            
            $consulta = cliente::where("id", "=", $ID) -> get();

            return view("AsesoraT.Modificar_clientes")
            -> with("consulta", $consulta[0]);
        }
        else
        {
            return view("AsesoraT.login");
        }

    }

    public function guardar_cambios_cliente(Request $request)
    {
        $this->validate($request, [
            "nombre" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aPaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aMaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "telefono" => "required|regex:/^[0-9]{10}+$/",
            "correo" => "required|email",
            "Identificación" => "mimes:jpg,png,gif,jpeg,pdf",
        ]);

        $ID = Session("ID");
        $Correo = Session("Correo");

        $file = $request -> file('Identificación');
        if($file != NULL)
        {
            $img = $file -> getClientOriginalName();
            $img2 = $request -> id . $img;
            \Storage::disk("local") -> put($img2, \File::get($file));   
        }
        
        $cliente = cliente::withTrashed() -> find($request -> id);
        $cliente -> nombre = $request -> nombre;
        $cliente -> aPaterno = $request -> aPaterno;
        $cliente -> aMaterno = $request -> aMaterno;
        $cliente -> telefono = $request -> telefono;
        $cliente -> correo = $request -> correo;
        if($file != NULL)
        {
            $cliente -> Identificación = $img2;
        }
        $cliente -> save();
        
        

        Session::flash("mensaje", "Cambios guardados con éxito");
        return redirect()->route("main");
    }

    public function reporte_cliente()
    {
        $ID = Session("ID");
        if($ID != NULL)
        {
            $clientes = cliente::withTrashed()
            -> select
            (
                "clientes.id", 
                "clientes.nombre", 
                "clientes.aPaterno", 
                "clientes.aMaterno", 
                "clientes.telefono",
                "clientes.correo", 
                "clientes.Identificación", 
                "clientes.deleted_at"
            )
            -> where("clientes.id", "!=", "181803000")
            -> get();
            return view("AsesoraT.Reporte_clientes")
            -> with("clientes", $clientes);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function suspender_cliente()
    {
        $ID = Session("ID");
        if($ID != NULL)
        {
            citas::withTrashed()->where("id_cliente", "=", $ID)->delete();
            cliente::withTrashed()->find($ID)->delete();;
            Session::forget("Nombre");
            Session::forget("ID");
            Session::forget("Correo");
            Session::flush();
            return redirect()->route("main")
            -> with(Session::flash("mensaje", "Cuenta eliminada con éxito"));
        }
        else
        {
            return view("AsesoraT.login");
        }
        
    }

    public function eliminar_cliente()
    {
        $ID = Session("ID");

        if($ID != NULL)
        {
            citas::withTrashed()->where("id_cliente", "=", $ID)->forceDelete();
            cliente::withTrashed()->find($ID)->forceDelete();;
            Session::forget("Nombre");
            Session::forget("ID");
            Session::forget("Correo");
            Session::flush();
            return redirect()->route("main")
            -> with(Session::flash("mensaje", "Cuenta eliminada con éxito"));
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function modifica_cliente($id)
    {
        $ID = Session("ID");
        if($ID != NULL)
        {
            $consulta = cliente::where("id", "=", $id) -> get();

            return view("AsesoraT.Modificar_clientes")
            -> with("consulta", $consulta[0]);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function suspende_cliente($id)
    {

        $buscarcliente = cliente::where("id", $id)->get();
        $cuantos = count($buscarcliente);
        if($cuantos != 0)
        {
            citas::withTrashed()->where("id_cliente", "=", $id)->forceDelete();
            cliente::withTrashed()->find($id)->delete();

            return redirect() -> route("reporte_cliente")
            -> with("mensaje", "Cliente suspendido con éxito");
        }

    }

    public function activa_cliente($id)
    {
        $clientes = cliente::withTrashed()->where("id", $id) -> restore();
        return redirect() -> route("reporte_cliente")
        -> with("mensaje", "Cliente reactivado con éxito");
    }

    public function borrar_cliente($id)
    {

        $buscarcliente = cliente::where("id", $id)->get();
        $cuantos = count($buscarcliente);
        if($cuantos != 0)
        {
            citas::withTrashed()->where("id_cliente", "=", $id)->forceDelete();
            cliente::withTrashed()->find($id)->forceDelete();

            return redirect() -> route("reporte_cliente")
            -> with("mensaje", "El cliente ha sido eliminado con éxito");
        }

    }

    public function registroabogado()
    {

        $esp = especialidades::all();

        $idaactual = Abogados::withTrashed()->orderby("id", "desc")->take(1)->get();
        $idanuevo = $idaactual[0]->id+1;

        return view("AsesoraT.Abogados")
        ->with("idanuevo", $idanuevo)
        ->with("esp", $esp);
    }

    public function almacenaabogado(Request $request)
    {
        $this->validate($request, [
            "cedula_profesional" => "required|regex:/^[0-9]{8}+$/",
            "nombre" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aPaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aMaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "telefono" => "required|regex:/^[0-9]{10}+$/",
            "correo" => "required|email",
            "Identificación" => "required|mimes:jpg,png,gif,jpeg,pdf",
            "contraseña" => "required",
            "contraseñaconf" => "required|same:contraseña"
        ]);

        $file = $request -> file("Identificación");
        $img = $file -> getClientOriginalName();
        $img2 = $request -> id . $img;
        \Storage::disk("local") -> put($img2, \File::get($file));

        $abogado = new Abogados;
        $abogado -> id = $request -> id;
        $abogado -> id_especialidad = $request -> id_especialidad;
        $abogado -> cedula_profesional = $request -> cedula_profesional;
        $abogado -> nombre = $request -> nombre;
        $abogado -> aPaterno = $request -> aPaterno;
        $abogado -> aMaterno = $request -> aMaterno;
        $abogado -> telefono = $request -> telefono;
        $abogado -> correo = $request -> correo;
        $abogado -> Identificación = $img2;
        $abogado -> contraseña = md5($request -> contraseña);
        $abogado -> save();

        Session::flash("mensaje", "El abogado ha sido registrado con éxito");
        return redirect()->route("registroabogado");
    }

    public function modificar_abogado()
    {
        $ID = Session("ID");
        $Correo = Session("Correo");

        if($ID <> "")
        {
            
            $consulta = Abogados::where("id", "=", $ID) -> get();
            $esp = especialidades::all();
            

            return view("AsesoraT.Modificar_abogados")
            -> with("consulta", $consulta[0])
            ->with("esp", $esp);
        }
        else
        {
            return view("AsesoraT.login");
        }

    }

    public function guardar_cambios_abogado(Request $request)
    {
        $this->validate($request, [
            "nombre" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aPaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "aMaterno" => "required|regex:/^[a-z, A-Z, ,ñ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/",
            "telefono" => "required|regex:/^[0-9]{10}+$/",
            "correo" => "required|email",
            "Identificación" => "mimes:jpg,png,gif,pdf,jpeg"
        ]);

        $ID = Session("ID");
        $Correo = Session("Correo");

        $file = $request -> file('Identificación');
        if($file != NULL)
        {
            $img = $file -> getClientOriginalName();
            $img2 = $request -> id . $img;
            \Storage::disk("local") -> put($img2, \File::get($file));   
        }
        
        $ab = Abogados::withTrashed() -> find($request -> id);
        $ab -> nombre = $request -> nombre;
        $ab -> aPaterno = $request -> aPaterno;
        $ab -> aMaterno = $request -> aMaterno;
        $ab -> telefono = $request -> telefono;
        $ab -> correo = $request -> correo;
        if($file != NULL)
        {
            $ab -> Identificación = $img2;
        }
        $ab -> save();
        
        

        Session::flash("mensaje", "Cambios guardados con éxito");
        return redirect()->route("main");
    }

    public function reporte_abogado()
    {
        $ID = Session("ID");
        if($ID != NULL)
        {
            $abogados = Abogados::withTrashed()
            -> select
            (
                "abogados.id", 
                "abogados.cedula_profesional", 
                "abogados.nombre", 
                "abogados.aPaterno", 
                "abogados.aMaterno", 
                "abogados.telefono", 
                "abogados.correo", 
                "abogados.Identificación",
                "abogados.deleted_at"
            )
            -> where("abogados.id", "!=", "171703000")
            -> get();
            return view("AsesoraT.Reporte_abogados")
            -> with("abogados", $abogados);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function suspender_abogado()
    {
        $ID = Session("ID");
        
        if($ID != NULL)
        {
            citas::withTrashed()->where("id_abogado", "=", $ID)->delete();
            Abogados::withTrashed()->find($ID)->delete();
            Session::forget("Nombre");
            Session::forget("ID");
            Session::forget("Correo");
            Session::flush();
            return redirect()->route("main")
            -> with(Session::flash("mensaje", "Cuenta eliminada con éxito"));
        }
        else
        {
            return view("AsesoraT.login");
        }
        
    }

    public function eliminar_abogado()
    {
        $ID = Session("ID");

        if($ID != NULL)
        {
            citas::withTrashed()->where("id_abogado", "=", $ID)->forceDelete();
            Abogados::withTrashed()->find($ID)->forceDelete();
            Session::forget("Nombre");
            Session::forget("ID");
            Session::forget("Correo");
            Session::flush();
            return redirect()->route("main")
            -> with(Session::flash("mensaje", "Cuenta eliminada con éxito"));
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function modifica_abogado($id)
    {
        $ID = Session("ID");
        if($ID != NULL)
        {
            $consulta = Abogados::where("id", "=", $id) -> get();
            $esp = especialidades::all();

            return view("AsesoraT.Modificar_abogados")
            -> with("consulta", $consulta[0])
            ->with("esp", $esp);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function suspende_abogado($id)
    {

        $buscarabogado = Abogados::where("id", $id)->get();
        $cuantos = count($buscarabogado);
        if($cuantos != 0)
        {
            citas::withTrashed()->where("id_abogado", "=", $id)->delete();
            Abogados::withTrashed()->find($id)->delete();

            return redirect() -> route("reporte_abogado")
            -> with("mensaje", "El abogado suspendido con éxito");
        }

    }

    public function activa_abogado($id)
    {
        $abogados = Abogados::withTrashed()->where("id", $id)->restore();
        return redirect() -> route("reporte_abogado")
        -> with("mensaje", "Abogado reactivado con éxito");
    }

    public function borrar_abogado($id)
    {

        $buscarabogado = Abogados::where("id", $id)->get();
        $cuantos = count($buscarabogado);
        if($cuantos != 0)
        {
            citas::withTrashed()->where("id_abogado", "=", $id)->forceDelete();
            Abogados::withTrashed()->find($id)->forceDelete();

            return redirect() -> route("reporte_abogado")
            -> with("mensaje", "El abogado ha sido eliminado con éxito");
        }

    }

    public function agendarcita()
    {
        $asesesoria = tipo_asesoria::all();
        $tramite = tipo_tramites::all();
        $abogado = Abogados::all();
        
        //$na = \DB::table("abogados") -> select(\DB::raw('CONCAT("nombre", " ", "aPaterno", " ", "aMaterno") as nombre')) 
        //-> where("id_abogado", "=", "id_abogado") -> get();

        $idcactual = citas::withTrashed()->orderby("id_cita", "desc") -> take(1) -> get();
        $idcnuevo = $idcactual[0] -> id_cita + 1;

        $ID = Session("ID");

        if($ID != NULL)
        {
            return view("AsesoraT.Citas")
            -> with("idcnuevo", $idcnuevo)
            -> with("asesesoria", $asesesoria)
            -> with("tramite", $tramite)
            -> with("abogado", $abogado);
        }
        else
        {
            return view("AsesoraT.login");
        }
        
        //-> with("na", $na);
    }

    public function almacenacita(Request $request)
    {
        $this -> validate($request, [
            "fecha" => "required|date",
            "hora" => "required"
        ]);

        $ID = Session("ID");

        $cita = new citas;
        $cita -> id_cita = $request -> id_cita;
        $cita -> id_asesoria = $request -> id_asesoria;
        $cita -> id_tramite = $request -> id_tramite;
        $cita -> id_cliente = $ID;
        $cita -> id_abogado = $request -> id_abogado;
        $cita -> fecha = $request -> fecha;
        $cita -> hora = $request -> hora;
        $cita -> save();

        return redirect() -> route("main")
        -> with(Session::flash("mensaje", "Cita agendada con éxito!"));
    }

    public function consulta_citas()
    {
        $ID = Session("ID");

        if($ID != NULL)
        {
            $citas =  \DB::table("citas")
            -> select("citas.id_cita", "citas.fecha", "citas.hora")
            -> where("id_cliente", "=", $ID)
            -> get();
            return view("AsesoraT.Consulta_citas")
            -> with("citas", $citas);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function consulta_citas_abogado()
    {

        $ID = Session("ID");
        
        if($ID != NULL)
        {
            $citas =  \DB::table("citas")
            -> select("citas.id_cita", "citas.fecha", "citas.hora")
            -> where("id_abogado", "=", $ID)
            -> get();
            return view("AsesoraT.Consulta_citas_abogado")
            -> with("citas", $citas);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

    public function reporte_citas()
    {
        $ID = Session("ID");

        if($ID != NULL)
        {
            $citas = \DB::table("citas")
            -> select("citas.id_cita", "citas.id_asesoria", "citas.id_tramite", "citas.id_cliente", "citas.id_abogado", "citas.fecha", "citas.hora")
            -> where("id_cita", "!=", "111103000")
            -> get();

            return view("AsesoraT.Reporte_citas")
            -> with("citas", $citas);
        }
        else
        {
            return view("AsesoraT.login");
        }
    }

}