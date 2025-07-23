<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
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

        .btn-user {
            margin: 10px;
            font-size: 1rem;
            font-weight: bold;
            width: 200px;
        }
    </style>
</head>
<body>

<div class="container text-center">
    <h2 class="mb-4">Seleccione un Usuario</h2>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="../validar_clave.php?usuario=1" class="btn btn-outline-primary btn-user">Usuario 1</a>
        <a href="../validar_clave.php?usuario=2" class="btn btn-outline-primary btn-user">Usuario 2</a>
        <a href="../validar_clave.php?usuario=3" class="btn btn-outline-primary btn-user">Usuario 3</a>
        <a href="../validar_clave.php?usuario=4" class="btn btn-outline-primary btn-user">Usuario 4</a>
    </div>
    <div class="mt-4">
        <a href="../menu_principal.php" class="btn btn-outline-secondary">Volver al Menú</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>