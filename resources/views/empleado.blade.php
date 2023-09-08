<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "{{asset('CSS/estilos.css')}}">
</head>
<body>
    <h1>Empresa PATITO.com </h1>    
    <br>
    Nombre del empleado <?php echo "$nombre trabajó $dias se le pagó $nomina"; ?>
    <br>
    Nombre del empleado {{$nombre}} trabajó {{$dias}} se le pagó {{$nomina}}
    <br>
    @if($nombre=="Fred")
    <h1>Hola Spartan Fred</h1>
    <br>
    <img src = "{{asset('Fotos/Fred.jpg')}}" weight = 100 height = 100>
    @endif
    @if($nombre=="Bruce")
    <h1>Buenas tardes Sr. Wayne</h1>
    <br>
    <img src = "{{asset('Fotos/Bat.jpg')}}" weight = 100 height = 100>
    @else
    <h1>Sin foto</h1>
    @endif
    <br>
    <a href = "{{route('salir')}}"> Cerrar nomina</a>
</body>
</html>
