<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelNow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        font-family: Arial;
        background: #111118;
        padding: 0;
    }

    /* Codigo de la Barra de navegacion*/
    .navbar-custom {
        background: #1a1a24;
        padding: 16px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #333;
    }
    .navbar-custom .brand {
        color: #FFBA67;
        font-size: 1.4rem;
        font-weight: bold;
    }
    .navbar-custom .nav-links a {
        color: #ccc;
        text-decoration: none;
        margin-left: 20px;
    }
    .navbar-custom .nav-links a.active {
        color: #FFBA67;
        border-bottom: 2px solid #FFBA67;
        padding-bottom: 2px;
    }

    /* Codigo para la tabla */
    .table-wrapper {
        padding: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #1a1a24;
        border-radius: 12px;
        overflow: hidden;
    }

    th {
        background: #222230;
        color: #FFBA67;
        padding: 14px 12px;
        text-align: left;
        font-size: 0.8rem;
        letter-spacing: 1px;
        border-bottom: 1px solid #333;
    }

    td {
        padding: 16px 12px;
        color: #ccc;
        border-bottom: 1px solid #2a2a38;
        vertical-align: middle;
    }

    tr:hover td {
        background: #22222e;
    }

    img {
        width: 70px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }

    .badge-hab {
        background: #2a2a3a;
        color: #aaa;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
    }
    tbody tr:nth-child(even) td {
    background: #1f1f2e;
}
</style>
    
</head>
<body>

<div class="navbar-custom">
    <span class="brand">Catálogo de Hoteles</span>
    <div class="nav-links">
        <a href="/hotel" class="active">Hoteles</a>
        <a href="/reserva">Reservar</a>
        <a href="/misreservas">Mis Reservas</a>
        <a href="/">Inicio</a>
    </div>
</div>

<div class="table-wrapper">
<table>
    <thead>
        <tr>

            <th>ID</th>
            <th>PRODUCTO</th>
            <th>PRECIO</th>
            <th>CATEGORÍA</th>

        </tr>
    </thead>

    <tbody>
        @foreach($hotels as $hotel)

        <tr>

            <td style="color:#888; font-size:0.8rem;">H{{ str_pad(['id'], 3, '0', STR_PAD_LEFT) }}</td>
            <td style="color:white; font-weight:bold;">{{ ['nombre'] }}</td>
            <td style="color:white; font-weight:bold;">${{ number_format($hotel['precio'], 0, ',', '.') }}</td>
            <td><span class="badge-hab">{{ ['cantidad'] }} Unidades</span></td>
            <td style="font-size:0.85rem; max-width:180px;">{{ Str::limit(['categoria'], 50) }}</td>
        
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>