<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Registro Asesorías</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/especialidad.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">
    
    <form action= "{{route('almacenaasesoria')}}" method="POST" enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>

        @extends('AsesoraT.main')
        @section("contenido")

        <h1><center>Registro de asesoría</center></h1>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">ID</label>
                    @if($errors->first('id_asesoria'))
                    <p class = "badge bg-danger">{{$errors->first('id_asesoria')}}</p>
                    @endif
                    <input type = "text" name = "id_asesoria" value = "{{$idesnuevo}}" readonly = "readonly" class = "form-control" placeholder = "Id de la asesoria">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Tipo de asesoria</label>
                    @if($errors->first('tipo_asesoria'))
                    <p class = "badge bg-danger">{{$errors->first('tipo_asesoria')}}</p>
                    @endif
                    <input type = "text" name = "tipo_asesoria" value = "{{old('tipo_asesoria')}}" class = "form-control" placeholder = "Asesoria">
                </div>
            </div>
        </div>

        <div>
            <tr>
            <p>
            <center><button type="submit" class="btn btn-light">Guardar asesoria</button></center>
            </p>
            </tr>
        </div> 

        @stop

    </fieldset>
</body>
</html>