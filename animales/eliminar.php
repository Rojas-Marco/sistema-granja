<?php

include '../includes/conexion.php';

$id = intval($_GET['id']);
$sql = "DELETE FROM animales WHERE id_animal = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error al eliminar: " . $conn->error;
}
?>