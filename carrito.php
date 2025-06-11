<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Carrito de Compras</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
      background: #f9f9f9;
      color: #333;
    }
    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 20px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }
    h1 {
      text-align: center;
      margin-bottom: 2rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1.5rem;
    }
    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .total {
      font-weight: bold;
      text-align: right;
    }
    .btn {
      display: inline-block;
      padding: 12px 20px;
      background-color: black;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      text-align: center;
      transition: background 0.3s;
    }
    .btn:hover {
      background-color: #333;
    }
    .actions {
      display: flex;
      justify-content: space-between;
      gap: 1rem;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Tu Carrito</h1>

    <?php
    if (!empty($_SESSION['carrito'])) {
      $total = 0;
      echo '<table>';
      echo '<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>';

      foreach ($_SESSION['carrito'] as $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;

        echo '<tr>';
        echo '<td>' . htmlspecialchars($producto['nombre']) . '</td>';
        echo '<td>$' . number_format($producto['precio'], 2) . '</td>';
        echo '<td>' . $producto['cantidad'] . '</td>';
        echo '<td>$' . number_format($subtotal, 2) . '</td>';
        echo '</tr>';
      }

      echo '</table>';
      echo '<div class="total">Total: $' . number_format($total, 2) . '</div>';

      echo '<div class="actions">';
      echo '<a href="productos.php" class="btn">Seguir Comprando</a>';
      echo '<a href="procesar_pago.php" class="btn">Finalizar Compra</a>';
      echo '</div>';
    } else {
      echo '<p>Tu carrito está vacío.</p>';
      echo '<a href="productos.php" class="btn">Ver Productos</a>';
    }
    ?>
  </div>
</body>
</html>

