<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id] = 1;
    } else {
        $_SESSION['carrito'][$id]++;
    }
}

echo "<h2>Carrito de Compras</h2>";

include 'db.php';

$total = 0;
foreach ($_SESSION['carrito'] as $id => $cantidad) {
    $stmt = $conn->prepare("SELECT nombre, precio FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();

    echo $res['nombre'] . " x $cantidad = $" . ($res['precio'] * $cantidad) . "<br>";
    $total += $res['precio'] * $cantidad;
}

echo "<h3>Total: $$total</h3>";
