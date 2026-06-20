<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<div class="card p-4 shadow text-center">
    <h3 class="mb-4">¿Cómo deseas ingresar?</h3>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
        <a href="{{ route('productos.invitado') }}" class="btn btn-secondary">Entrar como invitado</a>
    </div>
</div>

</body>
</html>