<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
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

        .btn-outline-light-custom {
            background-color: transparent;
            border-color: #2c3358;
            color: #c7cbe0;
        }

        .btn-outline-light-custom:hover {
            background-color: #1a1f3a;
            border-color: #2c3358;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="card shadow p-4" style="max-width: 420px; width: 100%;">
    <h3 class="text-center fw-semibold mb-3">Bienvenido</h3>
    <p class="text-center text-subtitle mb-4">¿Cómo deseas ingresar?</p>

    <div class="d-flex flex-column gap-2">
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
        <a href="{{ route('productos.invitado') }}" class="btn btn-secondary-dark">Entrar como invitado</a>
        <a href="/api/productos" target="_blank" class="btn btn-outline-light-custom">Ver API (JSON)</a>
    </div>
</div>

</body>
</html>