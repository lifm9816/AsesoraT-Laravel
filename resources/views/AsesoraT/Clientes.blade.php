<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Registro Clientes</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/cliente2.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">

    <form action= "{{route('almacenacliente')}}" method="POST" enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>
        
        @extends('AsesoraT.main')
        @section("contenido")

        <h1><center>Registro de usuario</center></h1>
        
        <div class="form-group">
            <label class="btn btn-light">Cliente ID</label>
            @if($errors->first('id'))
            <p class="badge bg-danger"> {{ $errors->first('id') }}</p>
            @endif
          <input type="text" name ="id" value="{{$idcnuevo}}" readonly ='readonly' class="form-control" placeholder="Escribe la clave del producto">
        </div>

        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Nombre</label>
                    @if($errors->first('nombre'))
                    <p class = "badge bg-danger">{{$errors->first('nombre')}}</p>
                    @endif
                    <input type = "text" name = "nombre" value = "{{old('nombre')}}" class = "form-control" placeholder = "Nombre">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Apellido Paterno</label>
                    @if($errors->first('aPaterno'))
                    <p class = "badge bg-danger">{{$errors->first('aPaterno')}}</p>
                    @endif
                    <input type = "text" name = "aPaterno" value = "{{old('aPaterno')}}" class = "form-control" placeholder = "Apellido Paterno">
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
                        <input type = "text" name = "aMaterno" value = "{{old('aMaterno')}}" class = "form-control" placeholder = "Apellido Materno">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="btn btn-light">Teléfono</label>
                        @if($errors->first('telefono'))
                            <p class = "badge bg-danger">{{$errors->first('telefono')}}</p>
                        @endif
                        <input type = "text" name = "telefono" value = "{{old('telefono')}}" class = "form-control" placeholder = "Teléfono">
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
                    <input type = "text" name = "correo" value = "{{old('correo')}}" class = "form-control" placeholder = "Correo electrónico">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Identificación</label>
                    @if($errors->first('Identificación'))
                        <p class = "badge bg-danger">{{$errors->first('Identificación')}}</p>
                    @endif
                    <input type = "file" name = "Identificación" id = "Identificación" class = "form-control" placeholder = "Identificación">
                </div>
            </div>
        </div>
    
        <br>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1" class="btn btn-light">Contraseña</label>
                    @if($errors->first('contraseña'))
                    <p class = "badge bg-danger">{{$errors->first('contraseña')}}</p>
                    @endif
                    <input type="password" name = "contraseña" value = "{{old('contraseña')}}" class="input" placeholder="Contraseña">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1" class="btn btn-light">Confirmar contraseña</label>
                    @if($errors->first('contraseñaconf'))
                    <p class = "badge bg-danger">{{$errors->first('contraseñaconf')}}</p>
                    @endif
                    <input type="password" name = "contraseñaconf" value = "{{old('contraseñaconf')}}" class="input" placeholder="Confirma contraseña">
                </div>
            </div>
        </div>

        <div>
            <p>
            </p>
            <center><button type="submit" class="btn btn-light">Crear cuenta</button></center>
        </div>
        @stop 

    </fieldset>
</body>
</html>