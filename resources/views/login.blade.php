<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
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

        .form-select {
            background-color: #1a1f3a;
            border: 1px solid #2c3358;
            color: #f4f5fa;
        }

        .form-select:focus {
            background-color: #1a1f3a;
            border-color: #3b5bfd;
            color: #f4f5fa;
            box-shadow: 0 0 0 0.2rem rgba(59, 91, 253, 0.25);
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

<div class="card shadow p-4" style="max-width: 420px; width: 100%;">
    <h3 class="text-center fw-semibold mb-3">Iniciar sesión</h3>
    <p class="text-center text-subtitle mb-4">Ingresa tu nombre para acceder al panel de productos.</p>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label class="form-label">Usuario</label>
        <input type="text" name="nombre" class="form-control mb-3" placeholder="Tu nombre" required>

        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control mb-4" placeholder="••••••••">

        <div class="d-flex flex-column gap-2">
            <button type="submit" class="btn btn-primary">Entrar</button>
            <a href="{{ route('bienvenido') }}" class="btn btn-secondary-dark">Volver</a>
        </div>
    </form>
</div>

</body>
</html>