<?php
// ✅ Ruta corregida: subimos un nivel para encontrar 'includes/'
include '../includes/conexion.php';

// Ahora $conn está disponible gracias a conexion.php
$sql = "SELECT * FROM clientes";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes de la Granja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1BcYPZwmN-v1GHM58ne0-xKfoa05sjD3JCi8lCAP-B_j687BW4E2SWkfeIcTutm4Gh1o&usqp=CAU');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            backdrop-filter: brightness(0.8);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c3e50;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: rgba(201, 242, 221, 0.52);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 900px;
            width: 100%;
            margin: 40px auto;
        }

        h1 {
            font-weight: bold;
            color: #27ae60;
            text-align: center;
            margin-bottom: 20px;
        }

        .table th {
            background-color: #27ae60;
            color: white;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-sm {
            font-size: 0.85rem;
            padding: 0.25rem 0.5rem;
        }

        .btn-volver {
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Clientes de la Granja</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while ($cliente = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                            <td><?= htmlspecialchars($cliente['nombre']) ?></td>
                            <td><?= htmlspecialchars($cliente['telefono']) ?></td>
                            <td><?= htmlspecialchars($cliente['direccion']) ?></td>
                            <td class="text-center">
                                <!-- Botón Editar -->
                                <a href="editar.php?id=<?= $cliente['id_cliente'] ?>" 
                                   class="btn btn-warning btn-sm">Editar</a>
                                <!-- Botón Eliminar -->
                                <a href="eliminar.php?id=<?= $cliente['id_cliente'] ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('¿Estás seguro de eliminar a <?= addslashes($cliente['nombre']) ?>?')">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No hay clientes registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Botón para volver al menú principal -->
    <a href="../menu_principal.php" class="btn btn-outline-secondary btn-volver">Volver al Menú</a>
</div>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>