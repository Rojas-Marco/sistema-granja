<?php
include '../includes/conexion.php';

$id_venta = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar datos de la venta
$sql = "SELECT v.id_venta, c.nombre AS cliente, v.fecha_venta,
               a.tipo, dv.cantidad, dv.precio_unitario, dv.subtotal
        FROM ventas v
        JOIN clientes c ON v.id_cliente = c.id_cliente
        JOIN detalles_venta dv ON v.id_venta = dv.id_venta
        JOIN animales a ON dv.id_animal = a.id_animal
        WHERE v.id_venta = $id_venta";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Venta no encontrada.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap @5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center">Detalle de la Venta #<?= $id_venta ?></h2>
    <p><strong>Cliente:</strong> <?= htmlspecialchars($result->fetch_assoc()['cliente']) ?></p>

    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>Animal</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $result->data_seek(0); // Reiniciar puntero ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['tipo']) ?></td>
                    <td><?= $row['cantidad'] ?></td>
                    <td>$<?= number_format($row['precio_unitario'], 2) ?></td>
                    <td>$<?= number_format($row['subtotal'], 2) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary">Volver a Ventas</a>
</div>
</body>
</html>