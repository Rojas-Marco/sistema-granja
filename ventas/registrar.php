<?php

include '../includes/conexion.php';
include '../includes/header.php';
include '../includes/sidebar.php';

// Obtener clientes y animales
$clientes = $conn->query("SELECT * FROM clientes");
$animales = $conn->query("SELECT * FROM animales");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = intval($_POST['cliente']);
    $id_animal = intval($_POST['animal']);
    $cantidad = intval($_POST['cantidad']);
    $precio_venta = floatval($_POST['precio_venta']);
    $subtotal = $cantidad * $precio_venta;

    // Registrar venta
    $conn->query("INSERT INTO ventas (id_cliente, id_usuario) VALUES ($id_cliente, {$_SESSION['id_usuario']})");
    $id_venta = $conn->insert_id;

    // Registrar detalle de venta
    $conn->query("INSERT INTO detalles_venta (id_venta, id_animal, cantidad, precio_unitario, subtotal)
                  VALUES ($id_venta, $id_animal, $cantidad, $precio_venta, $subtotal)");

    // Actualizar cantidad de animal
    $conn->query("UPDATE animales SET cantidad = cantidad - $cantidad WHERE id_animal = $id_animal");

    echo "<div class='alert alert-success'>Venta registrada exitosamente.</div>";
}
?>

<div class="container mt-4">
    <h2>Registrar Venta</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Cliente:</label>
            <select name="cliente" class="form-select" required>
                <?php while ($cliente = $clientes->fetch_assoc()) { ?>
                    <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Animal:</label>
            <select name="animal" class="form-select" required>
                <?php while ($animal = $animales->fetch_assoc()) { ?>
                    <option value="<?= $animal['id_animal'] ?>" data-precio="<?= $animal['precio_venta'] ?>"><?= $animal['tipo'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Cantidad:</label>
            <input type="number" name="cantidad" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label>Precio por Unidad:</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control" readonly id="precio_venta">
        </div>
        <button type="submit" class="btn btn-success">Registrar Venta</button>
    </form>
</div>

<script>
    const animalSelect = document.querySelector("select[name='animal']");
    const precioInput = document.getElementById("precio_venta");

    animalSelect.addEventListener("change", () => {
        const selected = animalSelect.options[animalSelect.selectedIndex];
        precioInput.value = selected.dataset.precio;
    });
</script>

<?php include '../includes/footer.php'; ?>