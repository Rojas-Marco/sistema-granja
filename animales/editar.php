<?php

include '../includes/conexion.php';
include '../includes/header.php';
include '../includes/sidebar.php';

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $cantidad = intval($_POST['cantidad']);
    $precio_venta = floatval($_POST['precio_venta']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);

    $sql = "UPDATE animales SET tipo='$tipo', cantidad=$cantidad, 
            precio_venta=$precio_venta, descripcion='$descripcion' 
            WHERE id_animal = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Animal actualizado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

$sql = "SELECT * FROM animales WHERE id_animal = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="container mt-4">
    <h2>Editar Animal</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Tipo:</label>
            <input type="text" name="tipo" class="form-control" value="<?= $row['tipo'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Cantidad:</label>
            <input type="number" name="cantidad" class="form-control" value="<?= $row['cantidad'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Precio de Venta:</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control" value="<?= $row['precio_venta'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control" rows="3"><?= $row['descripcion'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>