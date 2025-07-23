<?php

include '../includes/conexion.php';
include '../includes/header.php';
include '../includes/sidebar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $cantidad = intval($_POST['cantidad']);
    $precio_venta = floatval($_POST['precio_venta']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);

    $sql = "INSERT INTO animales (tipo, cantidad, precio_venta, descripcion)
            VALUES ('$tipo', $cantidad, $precio_venta, '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Animal registrado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="container mt-4">
    <h2>Registrar Animal</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Tipo:</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Cantidad:</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Precio de Venta:</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>