<?php
session_start();

if (isset($_GET['id'], $_GET['accion'])) {
    $id = $_GET['id'];
    $accion = $_GET['accion'];

    if (isset($_SESSION['carrito'][$id])) {
        if ($accion === 'incrementar') {
            $_SESSION['carrito'][$id]['cantidad']++;
        } elseif ($accion === 'decrementar') {
            $_SESSION['carrito'][$id]['cantidad']--;
            if ($_SESSION['carrito'][$id]['cantidad'] <= 0) {
                unset($_SESSION['carrito'][$id]);
            }
        }
    }
}

header("Location: carrito.php");
exit();
