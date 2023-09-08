<?php
$Nombre = session("Nombre");
$ID = session("ID");
?>

<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Registro Citas</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/citas5.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">

    <form action= "{{route('almacenacita')}}" method="POST" enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>
        
        @extends('AsesoraT.main')
        @section("contenido")

        @if(Session::has("mensaje"))
            <div class="alert alert-dismissible alert-light">{{Session::get("mensaje")}}</div>
        @endif

        <h1><center>Registro de Cita</center></h1>
        
        <div class="form-group">
            <label class="btn btn-light">Cita ID</label>
            @if($errors->first('id_cita'))
            <p class="badge bg-warning"> {{ $errors->first('id_cita') }}</p>
            @endif
          <input type="text" name ="id_cita" value="{{$idcnuevo}}" readonly ='readonly' class="form-control" placeholder="Escribe la clave del producto">
        </div>

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Asesoria</label>
                    <select class = "form-select" name = "id_asesoria">
                        @foreach($asesesoria as $a)
                            <option value = "{{$a -> id_asesoria}}">{{$a -> tipo_asesoria}}</opition>
                        @endforeach
                    </select>       
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Tramite</label>
                    <select class = "form-select" name = "id_tramite">
                        @foreach($tramite as $t)
                            <option value = "{{$t -> id_tramite}}">{{$t -> tipo_tramite}}</opition>
                        @endforeach
                    </select>       
                </div>
            </div>
        </div>    

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Abogado</label>
                    <select class = "form-select" name = "id_abogado">
                        @foreach($abogado as $ab)
                            <option value = "{{$ab -> id}}">{{$ab -> nombre}}</opition>
                        @endforeach
                    </select>       
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Fecha</label>
                    @if($errors->first('fecha'))
                    <p class = "badge bg-danger">{{$errors->first('fecha')}}</p>
                    @endif
                    <input type = "date" name = "fecha">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Hora</label>
                    @if($errors->first('hora'))
                    <p class = "badge bg-danger">{{$errors->first('hora')}}</p>
                    @endif
                    <input type = "time" name ="hora">
                </div>
            </div>
        </div>


        <div>
            <p>
            </p>
            <center><button type="submit" class="btn btn-light">Agendar cita</button></center>
        </div>

        @if(Session::has("mensaje"))
            <div class="alert alert-dismissible alert-light">{{Session::get("mensaje")}}</div>
        @endif

        @stop 

    </fieldset>
</body>
</html>