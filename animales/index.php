<?php
include '../includes/conexion.php';

$sql = "SELECT * FROM animales";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Animales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fondo de animales de granja (vaca, gallinas, conejos) */
        body {
            background-image: url('https://animapedia.org/wp-content/uploads/2018/05/animales-dom%C3%A9sticos-vaca-animapedia.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            backdrop-filter: brightness(0.75);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            min-height: 100vh;
            margin: 0;
        }

        /* Contenedor de la tabla */
        .table-container {
            background-color: rgba(154, 232, 167, 0.3);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 40px auto;
        }

        /* Título */
        h2 {
            color: #2c3e50;
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
        }

        /* Tabla */
        .table th {
            background-color: #28a745;
            color: white;
            text-align: center;
        }

        .table td {
            background-color: #8dbfedff;
        }

        /* Botón de volver */
        .btn-volver {
            background-color: #343a40;
            color: white;
            width: 100%;
            padding: 10px;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-volver:hover {
            background-color: #212529;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="table-container">
        <h2 class="text-center">Listado de Animales</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['id_animal']) ?></td>
                            <td><?= htmlspecialchars($fila['tipo']) ?></td>
                            <td><?= htmlspecialchars($fila['cantidad']) ?></td>
                            <td>$<?= number_format($fila['precio_venta'], 2) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">No hay animales registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

                <br>
        <!-- Botón que lleva al menú principal -->
        <a href="../menu_principal.php" class="btn btn-volver">Volver al Menú</a>
    </div>
</div>

<!-- Bootstrap JS (opcional, pero recomendado) -->
<script src=" https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>