<?php
session_start();
if (!isset($_SESSION['logueado'])) {
    header("Location: ../login/login.php");
    exit;
}

include '../includes/conexion.php';
include '../includes/header.php';
include '../includes/sidebar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $direccion = $conn->real_escape_string($_POST['direccion']);

    $sql = "INSERT INTO clientes (nombre, telefono, direccion)
            VALUES ('$nombre', '$telefono', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Cliente registrado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="container mt-4">
    <h2>Registrar Cliente</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Dirección:</label>
            <textarea name="direccion" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>