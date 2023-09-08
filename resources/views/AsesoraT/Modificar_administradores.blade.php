<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Modificar Infromación</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/cliente.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">

    <form action= "{{route('guardar_cambios_administrador')}}" method="POST" enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>
        
        @extends('AsesoraT.main')
        @section("contenido")

        @if(Session::has("mensaje"))
            <div class="alert alert-dismissible alert-light">{{Session::get("mensaje")}}</div>
        @endif

        <h1><center>Modificar información de administrador</center></h1>
        
        <div class="form-group">
            <center><img src = "{{asset('Archivos/'. $consulta -> Identificación)}}" heigt = 150 width = 150></center>
            <label class="btn btn-light">Administrador ID</label>
            @if($errors->first('id'))
            <p class="badge bg-danger"> {{ $errors->first('id') }}</p>
            @endif
          <input type="text" name ="id" value="{{$consulta -> id}}" readonly ='readonly' class="form-control" placeholder="Escribe la clave del producto">
        </div>

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Nombre</label>
                    @if($errors->first('nombre'))
                    <p class = "badge bg-danger">{{$errors->first('nombre')}}</p>
                    @endif
                    <input type = "text" name = "nombre" value = "{{$consulta -> nombre}}" class = "form-control" placeholder = "Nombre">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Apellido Paterno</label>
                    @if($errors->first('aPaterno'))
                    <p class = "badge bg-danger">{{$errors->first('aPaterno')}}</p>
                    @endif
                    <input type = "text" name = "aPaterno" value = "{{$consulta -> aPaterno}}" class = "form-control" placeholder = "Apellido Paterno">
                </div>
            </div>
        </div>    

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Apellido Materno</label>
                    @if($errors->first('aMaterno'))
                    <p class = "badge bg-danger">{{$errors->first('aMaterno')}}</p>
                    @endif
                    <input type = "text" name = "aMaterno" value = "{{$consulta -> aMaterno}}" class = "form-control" placeholder = "Apellido Materno">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Teléfono</label>
                    @if($errors->first('teléfono'))
                    <p class = "badge bg-danger">{{$errors->first('teléfono')}}</p>
                    @endif
                    <input type = "text" name = "teléfono" value = "{{$consulta -> teléfono}}" class = "form-control" placeholder = "Teléfono">
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Correo electrónico</label>
                    @if($errors->first('correo'))
                    <p class = "badge bg-danger">{{$errors->first('correo')}}</p>
                    @endif
                    <input type = "text" name = "correo" value = "{{$consulta -> correo}}" class = "form-control" placeholder = "Correo electrónico">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Identificación</label>
                    @if($errors->first('Identificación'))
                    <p class = "badge bg-danger">{{$errors->first('Identificación')}}</p>
                     @endif
                    <input type = "file" name = "Identificación" value = "{{$consulta -> Identificación}}" class = "form-control" placeholder = "Identificación">
                </div>
            </div>
        </div>

        <div>
            <p>
            </p>
            <center><button type="submit" class="btn btn-light">Guardar cambios</button></center>
        </div>
        @stop 

    </fieldset>
</body>
</html>