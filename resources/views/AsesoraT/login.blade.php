<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    <title>AsesóraT | Iniciar Sesión</title>
    <link rel = "shortcut icon" href = "../public/Fotos/AsesóraT-logo-negro.png">
</head>
<body style = "background: url('Fotos/login4.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center;">

    <form action= "{{route('validar_cuenta')}}" method="POST" enctype ="multipart/form-data">
    {{csrf_field()}}
    <fieldset>
        @extends('AsesoraT.main')
        @section("contenido")

        <h1><center>Iniciar sesión</center></h1>
        
        <div class="d-flex justify-content-center">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <br>    
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Correo electrónico</label>
                    @if($errors->first('correo'))
                        <p class = "badge bg-danger">{{$errors->first('correo')}}</p>
                    @endif
                    <input type = "text" name = "correo" value = "{{old('correo')}}" class = "form-control" placeholder = "Correo electrónico">
                </div>
            
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Contraseña</label>
                    @if($errors->first('contraseña'))
                        <p class = "badge bg-danger">{{$errors->first('contraseña')}}</p>
                    @endif
                    <input type = "password" name = "contraseña" value = "{{old('contraseña')}}" class = "form-control" placeholder = "Contraseña">
                </div>

                <div>
                    <br>
                        <center><button type="submit" class="btn btn-light">Iniciar sesión</button></center>
                    </br>
                </div>
            </div>    
        </div>

        @if (Session::has('error'))
            <div>{{Session::get('error')}}</div>
        @endif

        @stop 
    </fieldset>
</body>
</html>