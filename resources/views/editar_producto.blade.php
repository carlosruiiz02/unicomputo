<!DOCTYPE html>
<html>
<head>
    <title>Editar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<div class="card p-4 shadow" style="max-width: 500px; margin: auto;">
    <h3 class="mb-4">Editar producto</h3>

    <form method="POST" action="{{ route('productos.update', $producto['codigo']) }}">
        @csrf
        @method('PUT')

        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control mb-3" value="{{ $producto['nombre'] }}" required>

        <label class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control mb-3" value="{{ $producto['precio'] }}" required>

        <label class="form-label">Cantidad</label>
        <input type="number" name="cantidad" class="form-control mb-3" value="{{ $producto['cantidad'] }}" required>

        <label class="form-label">Categoría</label>
        <input type="text" name="categoria" class="form-control mb-3" value="{{ $producto['categoria'] }}" required>

        <button type="submit" class="btn btn-success w-100">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary w-100 mt-2">Volver</a>
    </form>
</div>

</body>
</html>