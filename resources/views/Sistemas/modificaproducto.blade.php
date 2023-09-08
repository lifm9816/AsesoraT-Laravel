<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{asset('css/Cyborg.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/Cyborg.min')}}" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <form action="{{route('guardarcambios')}}" method="POST">
      {{csrf_field()}}
  <fieldset>
    <legend>Modifica productos</legend>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Clave:</label>
      <br>
      @if($errors->first('idp'))
      <p class="text-warning">{{$errors->first('idp')}}</p>
      @endif
      <input type="text" name="idp" value ="{{$productos->idp}}" readonly='readonly' class="form-control" placeholder="Introduce clave de producto">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nombre producto:</label>
      <br>
      @if($errors->first('nombre'))
      <p class="text-warning">{{$errors->first('nombre')}}</p>
      @endif
      <input type="text" name="nombre" value="{{$productos->nombre}}" class="form-control" placeholder="Introduce el nombre del producto">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Cantidad:</label>
      <br>
      @if($errors->first('cantidad'))
      <p class="text-warning">{{$errors->first('cantidad')}}</p>
      @endif
      <input type="number" name="cantidad" value="{{$productos->cantidad}}" class="form-control" placeholder="Introduce la cantidad de productos">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Costo:</label>
      <br>
      @if($errors->first('costo'))
      <p class="text-warning">{{$errors->first('costo')}}</p>
      @endif
      <input type="text" name="costo" value="{{$productos->costo}}" class="form-control" placeholder="Introduce el costo del producto">
    </div>
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Categoria</label>
      <select class="form-select" name='idc' >
        <option value = "{{$productos->idc}}">{{$productos->catego}}</option>
        @foreach($categorias as $c)
        <option value = '{{$c->idc}}'>{{$c->nombre}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Tipos</label>
      <select class="form-select" name='idt'>
        <option value = "{{$productos->idt}}">{{$productos->tipoprod}}</option>
        @foreach($tipos as $t)
        <option value = '{{$t->idt}}'>{{$t->nombre}}</option>
        @endforeach
      </select>
    </div>
    <fieldset class="form-group">
        <legend class="mt-4">Activo</legend>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="activo" value="Si" 
          @if($productos->activo == 'Si') checked @endif>
          <label class="form-check-label" for="optionsRadios1">
            Si
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="activo" value="No"
          @if($productos->activo == 'No') checked @endif>
          <label class="form-check-label" for="optionsRadios2">
            No
          </label>
        </div>
        <br>
      </fieldset>
  </fieldset>
    <button type="submit" class="btn btn-info">Modifica Producto</button>
    </form>
  </body>
</html>
