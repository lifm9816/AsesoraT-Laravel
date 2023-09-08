<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Reporte de Citas</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/cliente2.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">
    
    <form enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>
        @extends('AsesoraT.main')
        @section("contenido")

        <h1><center>Reporte de citas</center></h1>

        <center><table class="table table-hover"></center>
            <thead>
            <tr class="table-light">
                <th scope="row">Cita ID</th>
                <td>ID Asesoria</td>
                <td>ID Tramite</td>
                <td>ID Cliente</td>
                <td>ID Abogado</td>
                <td>Fecha</td>
                <td>Hora</td>
                <tr>
                @foreach($citas as $c)
                <tr class="table-light">
                    <th scope="row">{{$c->id_cita}}</th>
                    <td>{{$c->id_asesoria}}</td>
                    <td>{{$c->id_tramite}}</td>
                    <td>{{$c->id_cliente}}</td>
                    <td>{{$c->id_abogado}}</td>
                    <td>{{$c->fecha}}</td>
                    <td>{{$c->hora}}</td>
                </tr>
                @endforeach
                </tr>
            </tr>
            </thead>

        @stop 
    </fieldset>
</body>
</html>