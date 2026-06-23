<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at 30% 30%, #2a3a8c, #0c1330 70%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: #11162b;
            border: 1px solid #232a4d;
            border-radius: 1rem;
            color: #f4f5fa;
        }

        .text-subtitle {
            color: #9aa0bd;
        }

        .form-label {
            color: #c7cbe0;
        }

        .form-control {
            background-color: #1a1f3a;
            border: 1px solid #2c3358;
            color: #f4f5fa;
        }

        .form-control:focus {
            background-color: #1a1f3a;
            border-color: #3b5bfd;
            color: #f4f5fa;
            box-shadow: 0 0 0 0.2rem rgba(59, 91, 253, 0.25);
        }

        .form-control::placeholder {
            color: #6f7596;
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
    </style>
</head>
<body>

<div class="card shadow p-4" style="max-width: 480px; width: 100%;">
    <h3 class="text-center fw-semibold mb-3">Registrar producto</h3>
    <p class="text-center text-subtitle mb-4">Completa los datos del nuevo producto.</p>

    <form method="POST" action="{{ route('productos.store') }}">
        @csrf

        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre del producto" required>

        <label class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control mb-3" placeholder="Precio" required>

        <label class="form-label">Cantidad</label>
        <input type="number" name="cantidad" class="form-control mb-3" placeholder="Cantidad" required>

        <label class="form-label">Categoría</label>
        <input type="text" name="categoria" class="form-control mb-4" placeholder="Categoría" required>

        <div class="d-flex flex-column gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary-dark">Volver</a>
        </div>
    </form>
</div>

</body>
</html>