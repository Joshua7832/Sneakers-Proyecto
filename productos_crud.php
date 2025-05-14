<?php
include 'db.php'; 


if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $imagen);
    $stmt->execute();
    header("Location: productos_crud.php");
    exit();
}


if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $conn->query("DELETE FROM productos WHERE id = $id");
    header("Location: productos_crud.php");
    exit();
}


if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, imagen=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $imagen, $id);
    $stmt->execute();
    header("Location: productos_crud.php");
    exit();
}


$resultado = $conn->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Productos</title>
</head>
<body>
    <h1>Productos</h1>

    <form method="POST">
        <input type="hidden" name="id" id="id">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
        <textarea name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
        <input type="number" step="0.01" name="precio" id="precio" placeholder="Precio" required>
        <input type="text" name="imagen" id="imagen" placeholder="URL Imagen">
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Imagen</th><th>Acciones</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['descripcion'] ?></td>
                <td><?= $row['precio'] ?></td>
                <td><img src="<?= $row['imagen'] ?>" width="50"></td>
                <td>
                    <a href="?eliminar=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                    <button onclick='editar(<?= json_encode($row) ?>)'>Editar</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <script>
    function editar(producto) {
        document.getElementById('id').value = producto.id;
        document.getElementById('nombre').value = producto.nombre;
        document.getElementById('descripcion').value = producto.descripcion;
        document.getElementById('precio').value = producto.precio;
        document.getElementById('imagen').value = producto.imagen;
    }
    </script>
</body>
</html>
