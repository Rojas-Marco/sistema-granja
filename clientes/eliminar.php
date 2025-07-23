<?php
session_start();
if (!isset($_SESSION['logueado'])) {
    header("Location: ../login/login.php");
    exit;
}

include '../includes/conexion.php';

$id = intval($_GET['id']);
$sql = "DELETE FROM clientes WHERE id_cliente = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error al eliminar: " . $conn->error;
}
?>