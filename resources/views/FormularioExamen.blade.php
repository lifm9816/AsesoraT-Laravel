<html>
    <head>
        <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
        <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
    </head>
<body>
    <form action= "{{route('guardar_datos')}}" method="POST">
      {{csrf_field()}}
      <fieldset>
        <legend><center><h1>Renta de libro </h1></center></legend>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Nombre: </label>
          @if($errors->first('nombre'))
            <p class="text-danger"> {{ $errors->first('nombre') }}</p>
          @endif
          <input type="text" name = "nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Apellido Paterno</label>
          @if($errors->first('aPaterno'))
            <p class="text-danger"> {{ $errors->first('aPaterno') }}</p>
          @endif
          <input type="text" name = "aPaterno" value="{{old('aPaterno')}}" class="form-control" placeholder="Apellido paterno">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Apellido Materno</label>
          @if($errors->first('aMaterno'))
            <p class="text-danger"> {{ $errors->first('aMaterno') }}</p>
          @endif
          <input type="text" name = "aMaterno" value="{{old('aMaterno')}}" class="form-control" placeholder="Apellido Materno">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Telefono</label>
          @if($errors->first('telefono'))
            <p class="text-danger"> {{ $errors->first('telefono') }}</p>
          @endif
          <input type="text" name = "telefono" value="{{old('telefo')}}" class="form-control" placeholder="Número celular">
        </div>



        <fieldset class="form-group">
          <legend class="mt-4">Género</legend>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="idg" value="1" checked="">
            <label class="form-check-label" for="optionsRadios1">
              Masculino
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="idg" value="2">
            <label class="form-check-label" for="optionsRadios2">
              Femenino
            </label>
          </div>
      </fieldset>



      <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Área</label>
        <select class="form-select" name = "ida">
          <option value="1">Dirección</option>
          <option value="2">Recursos humanos</option>
          <option value="3">Producción</option>
          <option value="4">Finanzas o contabilidad</option>
          <option value="5">Marketing y ventas</option>
        </select>
      </div>


      <div class="form-group">
        <label for="exampleTextarea" class="form-label mt-4">Comentarios</label>
        <textarea class="form-control" name = "comentarios" rows="3"></textarea>
      </div>

      <br>
      <br>
        <button type="submit" class="btn btn-outline-danger">Guardar datos</button>

      </fieldset>
    </form>
  </body>
</html>
