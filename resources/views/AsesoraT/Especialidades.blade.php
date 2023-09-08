<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Registro Especialidades</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/especialidades.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">
    
    <form action= "{{route('almacenaespecialidad')}}" method="POST" enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>

        @extends('AsesoraT.main')
        @section("contenido")

        <h1><center>Registro de especialidades</center></h1>

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">ID</label>
                    @if($errors->first('id_especialiad'))
                    <p class = "badge bg-danger">{{$errors->first('id_especialiad')}}</p>
                    @endif
                    <input type = "text" name = "id_especialidad" value = "{{$idenuevo}}" readonly = "readonly" class = "form-control" placeholder = "Id de la especialidad">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Especialidad</label>
                    @if($errors->first('especialidad'))
                    <p class = "badge bg-danger">{{$errors->first('especialidad')}}</p>
                    @endif
                    <input type = "text" name = "especialidad" value = "{{old('especialidad')}}" class = "form-control" placeholder = "Esepecialidad">
                </div>
            </div>
        </div>

        <div>
            <tr>
            <p>
            <center><button type="submit" class="btn btn-light">Guardar especialidad</button></center>
            </p>
            </tr>
        </div> 
        @stop
    </fieldset>
</body>
</html>