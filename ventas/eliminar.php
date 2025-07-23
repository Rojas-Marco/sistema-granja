<?php
include '../includes/conexion.php';

$id_venta = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Iniciar transacción
$conn->begin_transaction();

try {
    // Eliminar detalles de venta
    $sql1 = "DELETE FROM detalles_venta WHERE id_venta = $id_venta";
    $conn->query($sql1);

    // Eliminar venta
    $sql2 = "DELETE FROM ventas WHERE id_venta = $id_venta";
    $conn->query($sql2);

    $conn->commit();
    echo "<script>alert('Venta eliminada correctamente.'); window.location.href='index.php';</script>";
} catch (Exception $e) {
    $conn->rollback();
    echo "<script>alert('Error al eliminar la venta.'); window.location.href='index.php';</script>";
}
?>