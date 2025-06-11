<?php
session_start();
include 'db.php';
include 'header.php';

$query = "SELECT * FROM productos";
$result = mysqli_query($conn, $query);

// Calcular total del carrito desde la sesión
$total = 0;
$contador = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $contador += $item['cantidad'];
        $total += $item['precio'] * $item['cantidad'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productos | Sneakers</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      margin: 0;
      background-color: #f9f9f9;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 2rem;
    }

    h2 {
      text-align: center;
      margin-bottom: 2rem;
    }

    .productos {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 2rem;
    }

    .producto {
      background: #fff;
      border-radius: 16px;
      padding: 1rem;
      box-shadow: 0 8px 16px rgba(0,0,0,0.05);
      text-align: center;
      transition: transform 0.2s;
    }

    .producto:hover {
      transform: translateY(-5px);
    }

    .producto img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 1rem;
    }

    .producto h3 {
      font-size: 18px;
      margin: 0.5rem 0;
    }

    .producto p {
      font-size: 14px;
      color: #555;
    }

    .producto .precio {
      font-weight: 600;
      color: black;
      margin: 0.5rem 0;
    }

    button {
      background: black;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 10px 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #333;
    }

    .resumen {
      margin-top: 2rem;
      background: #fff;
      padding: 1rem;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Catálogo de Productos</h2>

    <div class="productos">
      <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="producto">
          <img src="img/<?php echo $row['imagen']; ?>" alt="<?= $row['nombre'] ?>">
          <h3><?= $row['nombre'] ?></h3>
          <p><?= $row['descripcion'] ?></p>
          <p class="precio">$<?= number_format($row['precio'], 2) ?></p>
          <form method="POST" action="agregar_carrito.php">
            <input type="hidden" name="producto_id" value="<?= $row['id'] ?>">
            <button type="submit">Agregar al carrito</button>
          </form>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="resumen">
      <p>Productos en carrito: <strong><?= $contador ?></strong></p>
      <p>Total estimado: <strong>$<?= number_format($total, 2) ?></strong></p>
      <a href="carrito.php">Ir al carrito</a>
    </div>
  </div>
</body>
</html>

