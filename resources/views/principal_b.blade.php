<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">Listado de productos (invitado)</h2>

<a href="{{ route('bienvenido') }}" class="btn btn-secondary mb-3">Volver</a>

<table class="table table-bordered table-striped">
<tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Categoría</th>
</tr>

@foreach($productos as $producto)
<tr>
    <td>{{ $producto['codigo'] }}</td>
    <td>{{ $producto['nombre'] }}</td>
    <td>{{ $producto['precio'] }}</td>
    <td>{{ $producto['cantidad'] }}</td>
    <td>{{ $producto['categoria'] }}</td>
</tr>
@endforeach

</table>

</body>
</html>