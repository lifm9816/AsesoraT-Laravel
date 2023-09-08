<html>
  <head>
      <link href="css/Cyborg.css" rel="stylesheet" type="text/css" />
      <link href="css/Cyborg.min" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <form action= "{{route('almacenaproducto')}}" method="POST">
      {{csrf_field()}}
      <fieldset>
        <legend><center>Alta de productos</center></legend>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Clave:</label>
          @if($errors->first('idp'))
            <p class="text-danger"> {{ $errors->first('idp') }}</p>
          @endif
          <input type="text" name = "idp" value="{{$idpnuevo}}" readonly = 'readonly' class="form-control" placeholder="Escribe la clave del producto">
          
          <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Nombre Producto:</label>
          @if($errors->first('nombre'))
            <p class="text-danger"> {{ $errors->first('nombre') }}</p>
          @endif
          <input type="text" name = "nombre" value="{{old('nombre')}}" class="form-control" placeholder="Escribe el nombre del producto">
        </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Cantidad:</label>
          @if($errors->first('cantidad'))
            <p class="text-danger"> {{ $errors->first('cantidad') }}</p>
          @endif
          <input type="text" name = "cantidad" value="{{old('cantidad')}}" class="form-control" placeholder="Cantidad de productos">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Costo:</label>
          @if($errors->first('costo'))
            <p class="text-danger"> {{ $errors->first('costo') }}</p>
          @endif
          <input type="text" name = "costo" value="{{old('costo')}}" class="form-control" placeholder="Teclee el costo del producto">
        </div>

        <div class="form-group">
      <label class="form-label mt-4">Categorias:</label>
      <select class="form-select" name ="idc">
        @foreach($categorias as $c)
        <option value = '{{$c->idc}}'>{{$c->nombre}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
    <label class="form-label mt-4"><Table>Tipos</Table>:</label>
      <select class="form-select" name ="idt">
        @foreach($tipos as $t)
        <option value = '{{$t->idt}}'>{{$t->nombre}}</option>
        @endforeach
      </select>
    </div>


    <legend class="mt-4">Activo:</legend>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Activo" id="Sí" value="option1" checked="Sí">
        <label class="form-check-label" for="optionsRadios1">
            Sí
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="Activo" id="No" value="option2" checked="No">
        <label class="form-check-label" for="optionsRadios2">
            No
        </label>
      </div>

    <div>
        <button type="submit" class="btn btn-primary">Almacemar producto</button>
    </div>    

    </form>
  </body>