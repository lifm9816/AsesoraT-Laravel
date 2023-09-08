<?php
$Nombre = session("Nombre");
$ID = session("ID");
$Correo = session("Correo");
?>

<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <link href="css/Footer.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/Cyborg.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>AsesóraT | Inicio</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/main3.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;
    position: relative;">

    {{csrf_field()}}
    <fieldset>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AsesóraT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('inicio')}}">Inicio
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>

                    @if($ID == NULL || $ID >= 202003001 || $ID != 171703001)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle show" id = "navbarDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Clientes</a>
                        <div class="dropdown-menu">
                            @if($ID <= 181803000 || $ID >= 202003001)    
                            <a class="dropdown-item" href="{{route('registrocliente')}}">Registrar cliente</a>
                            @else
                            <a class="dropdown-item" href="{{route('modificar_cliente')}}">Modificar información</a>
                            <a class="dropdown-item" href="{{route('suspender_cliente')}}">Suspender cuenta</a>
                            <a class="dropdown-item" href="{{route('eliminar_cliente')}}">Eliminar cuenta</a>
                            @endif
                            @if($ID >= 202003001)
                                <a class="dropdown-item" href="{{route('reporte_cliente')}}">Consultar clientes</a>
                            @endif
                        </div>
                    </li>
                    @endif

                    @if($ID == NULL || $ID >= 202003001 || $ID >= 181803001 || $ID >= 171703000)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle show" id = "navbarDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Abogados</a>
                        <div class="dropdown-menu">
                            @if($ID == NULL || $ID >= 202003001)    
                            <a class="dropdown-item" href="{{route('registroabogado')}}">Registrar abogado</a>
                            @endif

                            @if($ID >= 171703001 && $ID < 181803000)
                            <a class="dropdown-item" href="{{route('modificar_abogado')}}">Modificar información</a>
                            <a class="dropdown-item" href="{{route('suspender_abogado')}}">Suspender cuenta</a>
                            <a class="dropdown-item" href="{{route('eliminar_abogado')}}">Eliminar cuenta</a>
                            @endif
                            
                            @if($ID >= 181803001 || $ID >= 171703001)
                            <a class="dropdown-item" href="{{route('reporte_abogado')}}">Consultar abogados</a>
                            @endif
                        </div>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultas</a>
                    </li>

                    @if($ID != NULL && $ID >= 171703001) 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle show" id = "navbarDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Citas</a>
                        <div class="dropdown-menu">
                            @if($ID >= 181803001 && $ID < 191903000)    
                                <a class="dropdown-item" href="{{route('agendarcita')}}">Agendar cita</a>
                            @endif
                            @if($ID >= 181803001 || $ID < 20200300)    
                                <a class="dropdown-item" href="{{route('consulta_citas')}}">Consultar citas</a>
                            @endif
                            @if($ID >= 171703001  && $ID < 181803000)
                                <a class="dropdown-item" href="{{route('consulta_citas_abogado')}}">Consultar citas</a>
                            @endif
                            @if($ID >= 202003000)    
                                <a class="dropdown-item" href="{{route('reporte_citas')}}">Reporte citas</a>
                            @endif
                        </div>
                    </li>
                    @endif
                    
                    @if( $ID >= 202003001)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle show" id = "navbarDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administradores</a>
                        <div class="dropdown-menu">    
                            <a class="dropdown-item" href="{{route('registrar_administrador')}}">Registrar administrador</a>
                            <a class="dropdown-item" href="{{route('modificar_administrador')}}">Modificar información</a>
                            <a class="dropdown-item" href="{{route('registroespecialidad')}}">Registrar especialidades</a>
                            <a class="dropdown-item" href="{{route('registroasesoria')}}">Registrar asesorias</a>
                            <a class="dropdown-item" href="{{route('registrotramite')}}">Registrar tramites</a>
                            <a class="dropdown-item" href="{{route('reporte_administrador')}}">Lista de administradores</a>
                        </div>
                    </li>
                    @endif

                    @if($ID == NULL)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Iniciar sesión</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cerrar_sesion')}}">Cerrar sesión</a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contáctanos</a>
                    </li>

                </ul>
                
            </div>
        </div>
    </nav>

    @if(Session::has("mensaje"))
        <div class="alert alert-dismissible alert-light">{{Session::get("mensaje")}}</div>
    @endif

    <div id = "contenido">
        @yield('contenido')
    </div>

    
    <footer class = "footer">
        <div class = "redes">
            <a href="https://www.facebook.com/luis.martines.18659041">
                <img src="Fotos/facebook.png" alt="facebook">
            </a>
            <a href="https://www.instagram.com/lifm16/">
                <img src="Fotos/instagram.png" alt="instagram.png">
            </a>
            <a href="https://twitter.com/?lang=es">
                <img src="Fotos/twitter.png" alt="twitter">
            </a>
        </div>
        <div class = "asesorat-info" > 
            <img class = "logo" src="Fotos/AsesóraT-logo-negro.png" alt="Logo de AsesóraT">
            <p class = "copyright"> &copy Copyright AsesóraT 2022 - 2023</p>
        </div>
        <img class = "desarrollador" src="Fotos/LTech-Logo.png" alt="LTech">
    </footer>
    
    </fieldset>


    
</body>
</html>    