<?php
$Nombre = session("Nombre");
$ID = session("ID");
$Correo = session("Correo");
?>

<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Reporte de Administradores</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/cliente.jpg');
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
                <td>Acciones</td>
                <tr>
                @foreach($admin as $a)
                <tr class="table-light">
                    <th scope="row">{{$a->id}}</th>
                    <td>{{$a->nombre}}</td>
                    <td>{{$a->aPaterno}}</td>
                    <td>{{$a->aMaterno}}</td>
                    <td>{{$a->teléfono}}</td>
                    <td>{{$a->correo}}</td>
                    <td><img src = "{{asset('Archivos/'. $a -> Identificación)}}" heigt = 50 width = 50></td>
                    <td>
                        <a href="{{route('modifica_administrador', ['id' => $a -> id])}}">
                        <button type="button" class="btn btn-success">Modificar</button></a>
                        @IF($a -> deleted_at)
                            <a href="{{route('activa_administrador', ['id' => $a -> id])}}">
                            <button type="button" class="btn btn-primary">Activar</button></a>
                            <a href="{{route('borrar_administrador', ['id' => $a -> id])}}">
                            <button type="button" class="btn btn-danger">Borrar</button></a>
                        @ELSE
                            <a href="{{route('suspende_administrador', ['id' => $a -> id])}}">
                            <button type="button" class="btn btn-warning">Suspender</button></a>
                            <a href="{{route('borrar_administrador', ['id' => $a -> id])}}">
                            <button type="button" class="btn btn-danger">Borrar</button></a>
                        @ENDIF
                    </td>
                </tr>
                @endforeach
                </tr>
            </tr>
            </thead>

        @stop 
    </fieldset>
</body>
</html>