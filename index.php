<?php
session_start();
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
    <?php if (isset($_SESSION['usuario'])): ?>
        <span style="margin-left: 20px;">Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
        <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin2'): ?>
    <div style="text-align: center; margin: 20px;">
        <a href="productos_crud.php" style="
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
        ">🛠 Ir al CRUD de productos</a>
    </div>
<?php endif; ?>
</nav>

    </header>

    <main class="productos">

        <div class="producto">
            <img src="img/Tenis/T7.jpg" alt="Tenis 1">
            <h2>Nike Grandstand II</h2>
            <p>$1799.00</p>
            
        </div>
        <div class="producto">
            <img src="img/Tenis/T8.jpg" alt="Tenis 2">
            <h2>Nike Lunar Roam</h2>
            <p>$2239.00</p>
            
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Sneakers sait.</p>
    </footer>
</body>
</html>
