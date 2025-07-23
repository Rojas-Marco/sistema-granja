<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PROYECTO FINAL - Marco Rojas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css ">
    <style>
        body {
            background-image: url('https://wallpapers.com/images/hd/farm-desktop-p4nuatvcek8nznhe.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-weight: bold;
            color: #2a2a2a;
        }

        .btn-accesibilidad {
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            background-color: #3498db; /* Azul claro vibrante */
            border: none;
            border-radius: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-accesibilidad:hover {
            background-color: #2980b9; /* Azul más oscuro al hover */
        }

        .fa-cow {
            margin-right: 10px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="overlay">
    <div class="card">
        <h1 class="display-5 fw-bold text-primary">PROYECTO FINAL</h1>
        <p class="lead text-secondary">Estudiante: Rojas Cobacango Marco</p>
        <hr class="my-4">

        <a href="menu_principal.php" class="btn btn-accesibilidad">
            <i class="fas fa-cow"></i> Acceder al Sistema
        </a>
    </div>
</div>

<footer>
    &copy; 2025 - Sistema de Gestión de una Granja
</footer>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>