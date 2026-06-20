<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">Listado de productos</h2>
<p>Sesión iniciada como: <strong>{{ session('usuario') }}</strong></p>

<a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Nuevo producto</a>
<a href="{{ route('bienvenido') }}" class="btn btn-secondary mb-3">Cerrar sesión</a>

<table class="table table-bordered table-striped">
<tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Categoría</th>
    <th>Acciones</th>
</tr>

@foreach($productos as $producto)
<tr>
    <td>{{ $producto['codigo'] }}</td>
    <td>{{ $producto['nombre'] }}</td>
    <td>{{ $producto['precio'] }}</td>
    <td>{{ $producto['cantidad'] }}</td>
    <td>{{ $producto['categoria'] }}</td>
    <td>
        <a href="{{ route('productos.edit', $producto['codigo']) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('productos.destroy', $producto['codigo']) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Eliminar</button>
        </form>
    </td>
</tr>
@endforeach

</table>

</body>
</html>