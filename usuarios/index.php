<?php
// Conexión a la base de datos
include '../includes/conexion.php';

// Consulta
$sql = "SELECT nombre, rol FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios del Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            backdrop-filter: brightness(0.8);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c3e50;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            width: 100%;
            margin: 40px auto;
        }

        h2 {
            color: #17a2b8;
            text-align: center;
            font-weight: bold;
        }

        .table th {
            background-color: #17a2b8;
            color: white;
            text-align: center;
        }

        .btn-volver {
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Usuarios del Sistema</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <?php
                            // Reemplazar nombres
                            $nombre = match($row['nombre']) {
                                'usuario1' => 'Vendedor 1',
                                'usuario2' => 'Vendedor 2',
                                'usuario3' => 'Gerente',
                                'usuario4' => 'Contador',
                                default => $row['nombre']
                            };
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($nombre) ?></td>
                                <td><?= htmlspecialchars($row['rol']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center text-muted">No hay usuarios registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a href="../menu_principal.php" class="btn btn-outline-secondary btn-volver">Volver al Menú</a>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>