<html>
<body>
    <h1> Reporte de productos </h1>
    <br>

    @if (Session::has('mensaje'))
        <div>{{Session::get('mensaje')}}</div>
    @endif

    <a href = '{{route("altaproducto")}}'>Alta productos</a>

    <table border = 1>
        <tr>
            <td> Nombre productos </td><td>Cantidad</td><td>Costos</td>
            <td>Categorias</td><td>Operaciones</td>
            @foreach($productos as $p)
            <tr><td>{{$p -> nombre}}</td><td>{{$p -> cantidad}}</td>
            <td>{{$p -> costo}}</td><td>{{$p -> catego}}</td>
            <td>Eliminar
                <a href = "{{route('modificaproducto', ['idp'=>$p->idp])}}">Modificar </a>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>