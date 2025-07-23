<?php
session_start();
if (!isset($_SESSION['logueado'])) {
    header("Location: ../login/login.php");
    exit;
}

include '../includes/conexion.php';
include '../includes/header.php';
include '../includes/sidebar.php';

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $direccion = $conn->real_escape_string($_POST['direccion']);

    $sql = "UPDATE clientes SET nombre='$nombre', telefono='$telefono', direccion='$direccion' WHERE id_cliente = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Cliente actualizado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

$sql = "SELECT * FROM clientes WHERE id_cliente = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="container mt-4">
    <h2>Editar Cliente</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?= $row['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="<?= $row['telefono'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Dirección:</label>
            <textarea name="direccion" class="form-control" rows="3"><?= $row['direccion'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>