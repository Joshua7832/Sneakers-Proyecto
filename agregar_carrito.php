<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto_id'])) {
    $producto_id = intval($_POST['producto_id']);

    // En esta parte puede obtener los datos del producto desde la base de datos
    $query = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($producto = $result->fetch_assoc()) {
        // Inicializar el carrito en caso de que no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // incrementar cantidad del producto en el carrito.
        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad']++;
        } else {
            
            $_SESSION['carrito'][$producto_id] = [
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'cantidad' => 1
            ];
        }
    }
}


header("Location: carrito.php");
exit;


header("Location: carrito.php");
exit;
?>

