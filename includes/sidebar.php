<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"><a href="../index.php" class="nav-link">Inicio</a></li>
        <li class="nav-item"><a href="../animales/index.php" class="nav-link">Animales</a></li>
        <li class="nav-item"><a href="../clientes/index.php" class="nav-link">Clientes</a></li>
        <li class="nav-item"><a href="../ventas/index.php" class="nav-link">Ventas</a></li>
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') { ?>
            <li class="nav-item"><a href="../usuarios/index.php" class="nav-link">Usuarios</a></li>
        <?php } ?>
        <li class="nav-item"><a href="../login/logout.php" class="nav-link text-danger">Cerrar Sesión</a></li>
    </ul>
</div>