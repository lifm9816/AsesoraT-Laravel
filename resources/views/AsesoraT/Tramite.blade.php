<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
</head>
<body style = "background: url('Fotos/tramite.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">
    
    <form action= "{{route('almacenatramite')}}" method="POST" enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>

        @extends('AsesoraT.main')
        @section("contenido")

        <h1><center>Registro de tramites</center></h1>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">ID</label>
                    @if($errors->first('id_tramite'))
                    <p class = "badge bg-danger">{{$errors->first('id_tramite')}}</p>
                    @endif
                    <input type = "text" name = "id_tramite" value = "{{$idtnuevo}}" readonly = "readonly" class = "form-control" placeholder = "Id del tramite">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Tipo de tramite</label>
                    @if($errors->first('tipo_tramite'))
                    <p class = "badge bg-danger">{{$errors->first('tipo_tramite')}}</p>
                    @endif
                    <input type = "text" name = "tipo_tramite" value = "{{old('tipo_tramite')}}" class = "form-control" placeholder = "Tramite">
                </div>
            </div>
        </div>

        <div>
            <tr>
            <p>
            <center><button type="submit" class="btn btn-light">Guardar tramite</button></center>
            </p>
            </tr>
        </div> 

        @stop

    </fieldset>
</body>
</html>