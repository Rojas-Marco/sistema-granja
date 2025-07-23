<?php
session_start();

$clave_correcta = "1234";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if ($clave === $clave_correcta) {
        // Contraseña correcta
        $_SESSION['usuario_validado'] = $usuario;
        header("Location: usuario$usuario.php");
        exit();
    } else {
        echo "<script>alert('Clave incorrecta'); window.history.back();</script>";
    }
} else {
    header("Location: usuarios.php");
    exit();
}
?>