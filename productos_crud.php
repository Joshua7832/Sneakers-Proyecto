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
    <style>
.btn-inicio {
    display: inline-block;
    background: linear-gradient(135deg, #4CAF50, #2E7D32);
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    border-radius: 30px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: background 0.3s ease, transform 0.2s ease;
    margin: 20px;
}

.btn-inicio:hover {
    background: linear-gradient(135deg, #66BB6A, #388E3C);
    transform: scale(1.05);
}
table {
    width: 100%;
    border-collapse: collapse;
    margin: 30px auto;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
    background-color: #fff;
}

th, td {
    padding: 12px 15px;
    text-align: center;
}

th {
    background-color: #4CAF50;
    color: white;
    text-transform: uppercase;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e0f7fa;
}

td img {
    border-radius: 6px;
}

td button, td a {
    padding: 6px 10px;
    margin: 2px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: white;
    text-decoration: none;
}

td button {
    background-color: #2196F3;
}

td a {
    background-color: #f44336;
}

td button:hover {
    background-color: #1976D2;
}

td a:hover {
    background-color: #d32f2f;
}
form {
    max-width: 600px;
    margin: 0 auto;
    background: #f9f9f9;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

form input[type="text"],
form input[type="number"],
form textarea {
    width: 100%;
    padding: 10px 15px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    box-sizing: border-box;
}

form textarea {
    resize: vertical;
}

form button {
    padding: 10px 20px;
    margin-right: 10px;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    transition: background-color 0.3s ease;
}

form button[name="actualizar"] {
    background-color: #2196F3;
}

form button:hover {
    opacity: 0.9;
}
</style>
    <title>CRUD Productos</title>
</head>
<body>
    <a href="index.php" class="btn-inicio">🏠 Ir al Inicio</a>
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
