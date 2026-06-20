<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<div class="card p-4 shadow" style="max-width: 400px; margin: auto;">
    <h3 class="mb-4">Iniciar sesión</h3>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label class="form-label">Usuario</label>
        <input type="text" name="nombre" class="form-control mb-3" placeholder="Tu nombre" required>

        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control mb-3" placeholder="••••••••">

        <button type="submit" class="btn btn-success w-100">Entrar</button>
        <a href="{{ route('bienvenido') }}" class="btn btn-secondary w-100 mt-2">Volver</a>
    </form>
</div>

</body>
</html>