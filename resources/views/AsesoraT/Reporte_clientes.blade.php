<?php
$Nombre = session("Nombre");
$ID = session("ID");
$Correo = session("Correo");
?>

<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Reporte de Clientes</title>
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

        <h1><center>Reporte de clientes</center></h1>

        <table class="table table-hover">
            <thead>
            <tr class="table-light">
                <th scope="row">id</th>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Teléfono</td>
                <td>Correo</td>
                <td>Identificación</td>
                @IF($ID > 202003000)
                    <td>Acciones</td>
                @ENDIF
                <tr>
                @foreach($clientes as $c)
                <tr class="table-light">
                    <th scope="row">{{$c->id}}</th>
                    <td>{{$c->nombre}}</td>
                    <td>{{$c->aPaterno}}</td>
                    <td>{{$c->aMaterno}}</td>
                    <td>{{$c->telefono}}</td>
                    <td>{{$c->correo}}</td>
                    <td><img src = "{{asset('Archivos/'. $c -> Identificación)}}" heigt = 50 width = 50></td>
                    @IF($ID > 202003000)
                    <td>
                        <a href="{{route('modifica_cliente', ['id' => $c -> id])}}">
                        <button type="button" class="btn btn-success">Modificar</button></a>
                        @if($c->deleted_at)
                            <a href="{{route('activa_cliente', ['id' => $c -> id])}}">
                            <button type="button" class="btn btn-primary">Activar</button></a>
                            <a href="{{route('borrar_cliente', ['id' => $c -> id])}}">
                            <button type="button" class="btn btn-danger">Borrar</button></a>
                        @else
                            <a href="{{route('suspende_cliente', ['id' => $c -> id])}}">
                            <button type="button" class="btn btn-warning">Suspender</button></a>
                            <a href="{{route('borrar_cliente', ['id' => $c -> id])}}">
                            <button type="button" class="btn btn-danger">Borrar</button></a>
                        @endif
                    </td>
                    @ENDIF
                </tr>
                @endforeach
                </tr>
            </tr>
            </thead>

        @stop 
    </fieldset>
</body>
</html>