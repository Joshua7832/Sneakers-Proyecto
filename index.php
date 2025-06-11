<?php
include 'db.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Tenis</title>
    <link rel="stylesheet" href="css/estilo_moderno.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <div class="logo">Sneakers Sait</div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="carrito.php">Carrito</a>
            <a href="login.php">Login</a>
        </nav>
    </header>

    <main class="productos">
        <!-- Simulación de productos. Puedes hacer un bucle PHP aquí -->
        <div class="producto">
            <img src="img/TC/TC1.jpg" alt="Tenis 1">
            <h2>Nike Blazer mid '77 Royal Blue</h2>
            <p>$2100.00</p>
            <button>Añadir al carrito <i class="bi bi-cart"></i></button>
        </div>
        <div class="producto">
            <img src="img/TC/TC2.jpg" alt="Tenis 2">
            <h2>Adidas Ultraboost</h2>
            <p>$150.00</p>
            <button>Añadir al carrito <i class="bi bi-cart"></i></button>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Sneakers sait.</p>
    </footer>
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
