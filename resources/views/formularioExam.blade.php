<html>
  <head>
    <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
    <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <form action= "{{route('guardardatos')}}" method="POST">
      {{csrf_field()}}
      <fieldset>
        <legend><center><h1>ALTA DE EMPLEADOS </h1></center></legend>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Clave de lector</label>
          @if($errors->first('lector'))
            <p class="text-danger"> {{ $errors->first('lector') }}</p>
          @endif
          <input type="text" name = "lector" value="{{old('lector')}}" class="form-control" placeholder="Ingrese la clave de lector del empleado">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Clave empleado</label>
          @if($errors->first('clave'))
            <p class="text-danger"> {{ $errors->first('clave') }}</p>
          @endif
          <input type="text" name = "clave" value="{{old('clave')}}" class="form-control" placeholder="Ingrese la clave del empleado">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Sueldo</label>
          @if($errors->first('sueldo'))
            <p class="text-danger"> {{ $errors->first('sueldo') }}</p>
          @endif
          <input type="text" name = "sueldo" value="{{old('sueldo')}}" class="form-control" placeholder="Ingrese el sueldo del empleado">
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
