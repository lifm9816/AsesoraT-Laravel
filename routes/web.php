<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\pruebacontroller;
use App\Http\Controllers\productoscontroller;
use App\Http\Controllers\AsesoraT;
use App\Http\Controllers\AsesoraTLogin;

//Diseño de interfaces

Route::get("dsMain", [Desarrollo_Software::class, "dsMain"])->name("dsMain");
Route::get("Login2", [Desarrollo_software::class, "Login2"])->name("Login2");

//Fin de diseño de interfaces

//Proyecto de ingeniería de requisitos: AsesóraT
Route::get("p", [AsesoraT::class, "prueba"]);
Route::get("main", [AsesoraT::class, "main"])->name("main");
Route::get("inicio", [AsesoraT::class, "inicio"])->name("inicio");
Route::get("radmin", [AsesoraT::class, "registrar_administrador"])->name("registrar_administrador");
Route::POST("almacena_administrador", [AsesoraT::class, "almacena_administrador"])->name("almacena_administrador");
Route::get("modificar_administrador", [AsesoraT::class, "modificar_administrador"])->name("modificar_administrador");
Route::POST("guardar_cambios_administrador", [AsesoraT::class, "guardar_cambios_administrador"])->name("guardar_cambios_administrador");
Route::get("reporte_administrador", [AsesoraT::class, "reporte_administrador"])->name("reporte_administrador");
Route::get("modifica_administrador{id}", [AsesoraT::class, "modifica_administrador"])->name("modifica_administrador");
Route::get("suspende_administrador{id}", [AsesoraT::class, "suspende_administrador"])->name("suspende_administrador");
Route::get("activa_administrador{id}", [AsesoraT::class, "activa_administrador"])->name("activa_administrador");
Route::get("borrar_administrador{id}", [AsesoraT::class, "borrar_administrador"])->name("borrar_administrador");
Route::get("rcliente", [AsesoraT::class, "registrocliente"])->name("registrocliente");
Route::POST("almacenacliente", [AsesoraT::class, "almacenacliente"])->name("almacenacliente");
Route::get("modificar_cliente", [AsesoraT::class, "modificar_cliente"])->name("modificar_cliente");
Route::get("modifica_cliente{id}", [AsesoraT::class, "modifica_cliente"])->name("modifica_cliente");
Route::POST("guardar_cambios_cliente", [AsesoraT::class, "guardar_cambios_cliente"])->name("guardar_cambios_cliente");
Route::get("reporte_cliente", [AsesoraT::class, "reporte_cliente"])->name("reporte_cliente");
Route::get("suspender_cliente", [AsesoraT::class, "suspender_cliente"])->name("suspender_cliente");
Route::get("suspende_cliente{id}", [AsesoraT::class, "suspende_cliente"])->name("suspende_cliente");
Route::get("activa_cliente{id}", [AsesoraT::class, "activa_cliente"])->name("activa_cliente");
Route::get("eliminar_cliente", [AsesoraT::class, "eliminar_cliente"])->name("eliminar_cliente");
Route::get("borrar_cliente{id}", [AsesoraT::class, "borrar_cliente"])->name("borrar_cliente");
Route::get("rabogado", [AsesoraT::class, "registroabogado"])->name("registroabogado");
Route::POST("almacenaabogado", [AsesoraT::class, "almacenaabogado"])->name("almacenaabogado");
Route::get("modificar_abogado", [AsesoraT::class, "modificar_abogado"])->name("modificar_abogado");
Route::get("modifica_abogado{id}", [AsesoraT::class, "modifica_abogado"])->name("modifica_abogado");
Route::POST("guardar_cambios_abogado", [AsesoraT::class, "guardar_cambios_abogado"])->name("guardar_cambios_abogado");
Route::get("consulta_citas_abogado", [AsesoraT::class, "consulta_citas_abogado"])->name("consulta_citas_abogado");
Route::get("reporte_abogado", [AsesoraT::class, "reporte_abogado"])->name("reporte_abogado");
Route::get("suspender_abogado", [AsesoraT::class, "suspender_abogado"])->name("suspender_abogado");
Route::get("suspende_abogado{id}", [AsesoraT::class, "suspende_abogado"])->name("suspende_abogado");
Route::get("activa_abogado{id}", [AsesoraT::class, "activa_abogado"])->name("activa_abogado");
Route::get("eliminar_abogado", [AsesoraT::class, "eliminar_abogado"])->name("eliminar_abogado");
Route::get("borrar_abogado{id}", [AsesoraT::class, "borrar_abogado"])->name("borrar_abogado");
Route::get("respecialidad", [AsesoraT::class, "registroespecialidad"])->name("registroespecialidad");
Route::POST("almacenaespecialidad", [AsesoraT::class, "almacenaespecialidad"])->name("almacenaespecialidad");
Route::get("rasesoria", [AsesoraT::class, "registroasesoria"])->name("registroasesoria");
Route::POST("almacenaasesoria", [AsesoraT::class, "almacenaasesoria"])->name("almacenaasesoria");
Route::get("rtramite", [AsesoraT::class, "registrotramite"])->name("registrotramite");
Route::POST("almacenatramite", [AsesoraT::class, "almacenatramite"])->name("almacenatramite");
Route::get("rcita", [AsesoraT::class, "agendarcita"])->name("agendarcita");
Route::POST("almacenacita", [AsesoraT::class, "almacenacita"])->name("almacenacita");
Route::get("consulta_citas", [AsesoraT::class, "consulta_citas"])->name("consulta_citas");
Route::get("reporte_citas", [AsesoraT::class, "reporte_citas"])->name("reporte_citas");
Route::get("login", [AsesoraTLogin::class, "login"])->name("login");
Route::POST("validar_cuenta", [AsesoraTLogin::class, "validar_cuenta"])->name("validar_cuenta");
Route::get("cerrar_sesion", [AsesoraTLogin::class, "cerrar_sesion"])->name("cerrar_sesion");
//Fin de rutas de AsesóraT

Route::get('mensaje', [EmpleadosController::class, 'mensaje']);
Route::get('pago', [EmpleadosController::class, 'pago']);
Route::get("nomin/{dias}/{pago}", [EmpleadosController::class, "nomina"]);
Route::get('muestrasaludo/{nombre}/{dias}', [EmpleadosController::class, "saludo"]);
Route::get('salir',[EmpleadosController::class, 'salir'])->name("salir");

//Clase de programación web
Route::get('s1',[pruebacontroller::class,'Suma']); #Ruta: http://localhost/7mob/public/s1
Route::get('tabla',[pruebacontroller::class,'practabla']); #Ruta: http://localhost/7mob/public/tabla
Route::get('foto',[pruebacontroller::class,'fotoOwo']); #Ruta: http://localhost/7mob/public/foto   ????
Route::get('estilos',[pruebacontroller::class,'estilos']); #Ruta: http://localhost/7mob/public/estilos
Route::get('formulario',[pruebacontroller::class,'formulario']); #Ruta: http://localhost/7mob/public/formulario
Route::POST('guardaproducto',[pruebacontroller::class,'guardaproducto'])->name('guardaproducto');
Route::get('consultas', [pruebacontroller::class, 'consultas']);

//Productos
Route::get('altaproducto', [productoscontroller::class, 'altaproducto'])->name('altaproducto');
Route::POST('almacenaproducto', [productoscontroller::class, 'almacenaproducto'])->name('almacenaproducto');
Route::get('reporte', [productoscontroller::class, 'reporte'])->name('reporte');
Route::get('modificaproducto/{idp}', [productoscontroller::class, "modificaproducto"])->name("modificaproducto");
Route::POST('guardarcambios', [productoscontroller::class, 'guardacambios'])->name('guardarcambios');

use App\Http\Controllers\elizabethcontroller;
Route::get('formularioExam',[elizabethcontroller::class,'formularioExam']); #Ruta: http://localhost/7mob/public/formularioExam
Route::POST('guardardatos',[ethcontroller::class,'guardardatos'])->name('guardardatos');


#EXAMEN
use App\Http\Controllers\luiscontroller;
Route::get('FormularioExamen',[luiscontroller::class,'FormularioExamen']); #Ruta: http://localhost/7mob/public/formularioExam
Route::POST('guardar_datos',[luiscontroller::class,'guardar_datos'])->name('guardar_datos');

#====================================
Route::get('/', function () {
    return view('welcome');
});

Route::get('ej1', function () {
    return view('ejemplo1');
});


Route::get('ej2', function () {
    return view('tabla');
});


Route::get('ej3', function () {
    return view('ejerTabla');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Ruta1', function () {
    return "Hola mundo!";
});

http://127.0.0.1:8000

Route::get('/Area_rectangulo', function () {
    $base = 4;
    $altura = 10;
    $area = $base * $altura;
    return $area;
});

Route::get('/Area_rectangulo2', function () {
    $base = 4;
    $altura = 10;
    $area = $base * $altura;
    return "El area del rectángulo con base: $base y altura: $altura es: $area";
});

Route::get('/Area_rectangulo3/{base}/{altura}', function ($base, $altura) {
    $area = $base * $altura;
    return "El area del rectángulo con base: $base y altura: $altura es: $area";
});

Route::get('/nomina/{dias}/{pago_diario}', function ($dias, $pago_diario = null) {
    if($pago_diario == null)
    {
        $pago_diario = 100;
        $nomina = $dias * $pago_diario;
    }
    else
    {
        $nomina = $pago_diario * $dias;
    }
    echo "Total de dias trabajados: $dias";
    echo "<br> Cuota diaria: $pago_diario";
    echo "<br> Total pago: $nomina";
});

Route::get('/redireccionamiento', function () {
    return redirect ("Ruta1");
});

Route::redirect("redireccionamiento2", "Ruta1");

Route::redirect("Redireccionamiento3", "Area_rectangulo3/4/7");

Route::get('/Redireccionamiento4/{base}/{altura}', function($base, $altura)
{
    return redirect("/Area_rectangulo3/$base/$altura");
});

Route::redirect('/Redireccionamiento5', 'https://www.google.com');