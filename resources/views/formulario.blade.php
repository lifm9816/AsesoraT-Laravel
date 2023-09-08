<html>
  <head>
      <link href="css/solar.css" rel="stylesheet" type="text/css" />
      <link href="css/solar.min" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <form action= "{{route('guardaproducto')}}" method="POST">
      {{csrf_field()}}
      <fieldset>
        <legend><center>Alta de productos</center></legend>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Nombre Producto</label>
          @if($errors->first('nombre'))
            <p class="text-danger"> {{ $errors->first('nombre') }}</p>
          @endif
          <input type="text" name = "nombre" value="{{old('nombre')}}" class="form-control" placeholder="Escribe el nombre del producto">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Costo</label>
          @if($errors->first('costo'))
            <p class="text-danger"> {{ $errors->first('costo') }}</p>
          @endif
          <input type="text" name = "costo" value="{{old('costo')}}" class="form-control" placeholder="Escribe el costo del producto">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Correo</label>
          @if($errors->first('correo'))
            <p class="text-danger"> {{ $errors->first('correo') }}</p>
          @endif
          <input type="text" name = "correo" value="{{old('correo')}}" class="form-control" placeholder="Escriba su correo">
        </div>


        <div class="form-group">
          <label for="exampleTextarea" class="form-label mt-4">Descripción del producto</label>
          <textarea class="form-control" name = "descripcion" rows="3"></textarea>
        </div>

        <fieldset class="form-group">
          <legend class="mt-4">Tipo de producto</legend>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="idca" value="1" checked="">
            <label class="form-check-label" for="optionsRadios1">
              Lacteos
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="idca" value="2">
            <label class="form-check-label" for="optionsRadios2">
              Carnes
            </label>
          </div>
          <div class="form-check disabled">
            <input class="form-check-input" type="radio" name="idca" value="3" >
            <label class="form-check-label" for="optionsRadios3">
              Embutidos
            </label>
          </div>
      </fieldset>

      <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Sucursales</label>
        <select class="form-select" name = "ids">
          <option value="1">Angelopolis</option>
          <option value="2">Plaza dorada</option>
          <option value="3">Los fuertes</option>
        </select>
      </div>

      <br>
      <br>
        <button type="submit" class="btn btn-outline-danger">Guardar producto</button>

      </fieldset>
    </form>
  </body>
</html>
