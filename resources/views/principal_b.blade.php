<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at 30% 30%, #2a3a8c, #0c1330 70%);
            min-height: 100vh;
            padding: 2.5rem 1rem;
        }

        .container-card {
            background-color: #11162b;
            border: 1px solid #232a4d;
            border-radius: 1rem;
            color: #f4f5fa;
            max-width: 1000px;
            margin: 0 auto;
        }

        .text-subtitle {
            color: #9aa0bd;
        }

        .btn-secondary-dark {
            background-color: #1c2240;
            border-color: #1c2240;
            color: #e4e6f1;
        }

        .btn-secondary-dark:hover {
            background-color: #262c4f;
            border-color: #262c4f;
            color: #ffffff;
        }

        .table {
            color: #f4f5fa;
            margin-bottom: 0;
        }

        .table > :not(caption) > * > * {
            background-color: transparent;
            color: #f4f5fa;
            border-color: #232a4d;
        }

        .table thead th {
            color: #9aa0bd;
            font-weight: 500;
            border-bottom: 1px solid #2c3358;
        }

        .table tbody tr:hover {
            background-color: #161c38;
        }

        .badge-categoria {
            background-color: #1c2240;
            color: #c7cbe0;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 13px;
        }


    </style>
</head>
<body>

<div class="container-card shadow p-4">
    <div class="d-flex justify-content-between align-items-center mb-1">
        <h3 class="fw-semibold mb-0">Listado de productos</h3>
        <span class="badge-invitado">Modo invitado</span>
    </div>
    <p class="text-subtitle mb-4">Estás viendo el catálogo en modo de solo lectura.</p>

    <a href="{{ route('bienvenido') }}" class="btn btn-secondary-dark mb-3">Volver</a>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                <tr>
                    <td>{{ $producto['codigo'] }}</td>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>${{ number_format($producto['precio'], 2) }}</td>
                    <td>{{ $producto['cantidad'] }}</td>
                    <td><span class="badge-categoria">{{ $producto['categoria'] }}</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-subtitle py-4">No hay productos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>