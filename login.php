<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['nombre'];

        
        if (strtolower($usuario['nombre']) === 'admin') {
            header("Location: productos_crud.php"); 
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

