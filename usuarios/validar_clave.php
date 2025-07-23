<?php
session_start();
$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validar Clave</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f8f0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c3e50;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>

<div class="container text-center">
    <h2 class="mb-4">Ingrese la Clave para el Usuario <?= htmlspecialchars($usuario) ?></h2>
    <form action="procesar_clave.php" method="POST">
        <input type="hidden" name="usuario" value="<?= htmlspecialchars($usuario) ?>">
        <div class="mb-3">
            <input type="password" name="clave" class="form-control" placeholder="Clave" required>
        </div>
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </form>
    <div class="mt-4">
        <a href="usuarios.php" class="btn btn-outline-secondary">Cancelar</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>