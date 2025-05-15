<?php
include 'db.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sneakers-Sait</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image:url(img/sneakers.jpg);">
    <h1 style="color: #7a7777;">Bienvenido a nuestra Tienda</h1>
    <a href="productos.php">Ver Productos</a>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '<a href="login.html">Iniciar sesión</a>';
} else {
    echo 'Hola, ' . $_SESSION['usuario'] . ' | <a href="logout.php">Cerrar sesión</a>';
}
?>
