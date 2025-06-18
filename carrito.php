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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

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
    .btn-danger {
      background-color: red;
    }
    .btn-danger:hover {
      background-color: darkred;
    }
    .actions {
      display: flex;
      justify-content: space-between;
      gap: 1rem;
      margin-top: 1rem;
      flex-wrap: wrap;
    }
    .delete-btn {
      color: red;
      font-weight: bold;
      text-decoration: none;
    }
    .delete-btn:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <a href="index.php" class="btn" style="margin-bottom: 20px; display: inline-block;">
    <i class="bi bi-arrow-left"></i> Volver al inicio
  </a>

  <h1>Tu Carrito</h1>

  <?php
  if (!empty($_SESSION['carrito'])) {
    $total = 0;
    echo '<table>';
    echo '<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th>Acciones</th></tr>';

    foreach ($_SESSION['carrito'] as $id => $producto) {
      $subtotal = $producto['precio'] * $producto['cantidad'];
      $total += $subtotal;

      echo '<tr>';
      echo '<td>' . htmlspecialchars($producto['nombre']) . '</td>';
      echo '<td>$' . number_format($producto['precio'], 2) . '</td>';
      echo '<td>' . $producto['cantidad'] . '</td>';
      echo '<td>$' . number_format($subtotal, 2) . '</td>';
      echo '<td>
              <a href="actualizar_carrito.php?id=' . $id . '&accion=incrementar" class="btn" style="padding: 4px 10px;">+</a>
              <a href="actualizar_carrito.php?id=' . $id . '&accion=decrementar" class="btn" style="padding: 4px 10px;">−</a>
              <a class="delete-btn" href="eliminar_carrito.php?id=' . $id . '" onclick="return confirm(\'¿Eliminar este producto?\')">
                <i class="bi bi-trash3"></i>
              </a>
            </td>';
      echo '</tr>';
    }

    echo '</table>';
    echo '<div class="total">Total: $' . number_format($total, 2) . '</div>';

    echo '<div class="actions">';
    echo '<a href="productos.php" class="btn">Seguir Comprando</a>';
    echo '<a href="procesar_pago.php" class="btn">Finalizar Compra</a>';
    echo '<a href="vaciar_carrito.php" class="btn btn-danger" onclick="return confirm(\'¿Vaciar todo el carrito?\')">Vaciar Carrito</a>';
    echo '</div>';
  } else {
    echo '<p>Tu carrito está vacío.</p>';
    echo '<a href="productos.php" class="btn">Ver Productos</a>';
  }
  ?>
</div>
</body>
</html>


