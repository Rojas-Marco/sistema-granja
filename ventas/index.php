<?php
// Incluir conexión a la base de datos
include '../includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas de la Granja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVcQ-m23RWgNhF81CiL0fbVmLOljML8FPmUA&s');
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
            background-color: rgba(145, 213, 238, 0.47);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 900px;
            width: 100%;
            margin: 40px auto;
        }

        h2 {
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
            text-align: center;
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
    <h2>Ventas de la Granja</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Animal</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta mejorada: incluye el tipo de animal
                $sql = "SELECT 
                            v.id_venta,
                            c.nombre AS cliente,
                            GROUP_CONCAT(DISTINCT a.tipo SEPARATOR ', ') AS animales,
                            SUM(dv.subtotal) AS total
                        FROM ventas v
                        JOIN clientes c ON v.id_cliente = c.id_cliente
                        JOIN detalles_venta dv ON v.id_venta = dv.id_venta
                        JOIN animales a ON dv.id_animal = a.id_animal
                        GROUP BY v.id_venta
                        ORDER BY v.id_venta DESC";

                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id_venta']) ?></td>
                        <td><?= htmlspecialchars($row['cliente']) ?></td>
                        <td><?= htmlspecialchars($row['animales']) ?></td>
                        <td>$<?= number_format($row['total'], 2) ?></td>
                        <td class="text-center">
                            <!-- Botón Ver Detalle -->
                            <a href="detalle.php?id=<?= $row['id_venta'] ?>" 
                               class="btn btn-info btn-sm">Ver</a>
                            <!-- Botón Eliminar con confirmación -->
                            <a href="eliminar.php?id=<?= $row['id_venta'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Estás seguro de eliminar esta venta?')">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php
                    endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No hay ventas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Botón que lleva al menú principal -->
    <a href="../menu_principal.php" class="btn btn-outline-secondary btn-volver">Volver al Menú</a>
</div>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>