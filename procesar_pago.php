<?php
session_start();

if (empty($_SESSION['carrito'])) {
    header('Location: carrito.php');
    exit();
}

// Crear número de ticket único (timestamp + 4 dígitos aleatorios)
$ticket_id = date('YmdHis') . rand(1000, 9999);

// Obtener fecha y hora actuales
$fecha = date('d/m/Y H:i:s');

// Calcular total
$total = 0;
$productos = '';

foreach ($_SESSION['carrito'] as $producto) {
    $subtotal = $producto['precio'] * $producto['cantidad'];
    $total += $subtotal;
}

// Opcional: podrías guardar aquí en la base de datos

// Vaciar el carrito después de finalizar
$carrito_final = $_SESSION['carrito'];
unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ticket de Compra</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .ticket {
      max-width: 500px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
    }
    .info {
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    .total {
      text-align: right;
      font-weight: bold;
      margin-top: 10px;
    }
    .btn {
      display: block;
      text-align: center;
      margin-top: 30px;
      background: black;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 6px;
      width: 25%;
    }
  </style>
</head>
<body>

<div class="ticket">
  <h1>Ticket de Compra</h1>

  <div class="info">
    <p><strong>Ticket No:</strong> <?= $ticket_id ?></p>
    <p><strong>Fecha:</strong> <?= $fecha ?></p>
  </div>

  <table>
    <thead>
      <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cant.</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($carrito_final as $producto): ?>
        <tr>
          <td><?= htmlspecialchars($producto['nombre']) ?></td>
          <td>$<?= number_format($producto['precio'], 2) ?></td>
          <td><?= $producto['cantidad'] ?></td>
          <td>$<?= number_format($producto['precio'] * $producto['cantidad'], 2) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <p class="total">Total: $<?= number_format($total, 2) ?></p>

  <a href="index.php" class="btn">Volver al inicio</a>
</div>

</body>
</html>
