<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal - Sistema de Granja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css ">
    <style>
        body {
            background-color: #b9d4f0ff; /* Fondo claro, tono azul suave */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c3e50;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #f8e6e6ff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .btn-section {
            margin: 10px 0;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 20px;
            width: 100%;
            padding: 12px;
        }

        .btn-animales { background-color: #28a745; color: white; }
        .btn-clientes { background-color: #007bff; color: white; }
        .btn-ventas   { background-color: #ffc107; color: #222; }
        .btn-usuarios { background-color: #17a2b8; color: white; }

        .btn-volver {
            margin-top: 30px; /* Aquí está la separación extra */
            width: 100%;
        }

        h2 {
            margin-bottom: 30px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Sistema de Gestión de Granja</h2>
    <div class="d-grid gap-2">
        <a href="animales/index.php" class="btn btn-section btn-animales">
            <i class="fas fa-dove me-2"></i>Animales
        </a>
        <a href="clientes/index.php" class="btn btn-section btn-clientes">
            <i class="fas fa-user me-2"></i>Clientes
        </a>
        <a href="ventas/index.php" class="btn btn-section btn-ventas">
            <i class="fas fa-shopping-cart me-2"></i>Ventas
        </a>
        <a href="usuarios/usuarios.php" class="btn btn-section btn-usuarios">
            <i class="fas fa-users me-2"></i>Usuarios
        </a>
    </div>
    <br>    
    <div class="mt-4">
        <a href="index.php" class="btn btn-outline-secondary btn-volver">Volver al Inicio</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>