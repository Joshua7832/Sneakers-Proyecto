<?php
include 'includes/db.php';
include 'includes/header.php';

$query = "SELECT * FROM productos";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <h2>Lista de Productos</h2>
    <div class="productos">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="producto">
                <h3><?= $row['nombre'] ?></h3>
                <p><?= $row['descripcion'] ?></p>
                <p>Precio: $<?= $row['precio'] ?></p>
                <button onclick="agregarAlCarrito(<?= $row['id'] ?>)">Agregar al carrito</button>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>