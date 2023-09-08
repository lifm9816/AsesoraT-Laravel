<html>
<head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
</head>
<body style = "background: url('Fotos/CW.jpg');
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
                    <input type = "text" class = "form-control" placeholder = "Correo electrónico">
                </div>
            
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="btn btn-light">Contraseña</label>

                    <input type = "password" class = "form-control" placeholder = "Contraseña">
                </div>

                <div>
                    <br>
                        <center><button type="submit" class="btn btn-light">Iniciar sesión</button></center>
                    </br>
                </div>
            </div>    
        </div>


        @stop 
    </fieldset>
</body>
</html>