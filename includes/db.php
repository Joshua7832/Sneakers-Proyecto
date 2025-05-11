<?php
// Conexión a la base de datos MySQL usando XAMPP
$conn = mysqli_connect("localhost", "root", "", "tienda");

// Verificamos conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>