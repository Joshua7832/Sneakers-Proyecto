<?php
include 'db.php'; // Asegúrate que la ruta sea correcta

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['usuario']; // campo 'usuario' viene del formulario
    $email = $_POST['correo'];
    $password = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    
    if ($stmt && $stmt->execute([$nombre, $email, $password])) {
        $mensaje = "✅ Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
    } else {
        $mensaje = "❌ Error al registrar. Intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro | Sneakers</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .register-container {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border: 1px solid #ddd;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .register-container h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 24px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: black;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #333;
    }

    .link {
      display: block;
      text-align: center;
      margin-top: 1rem;
      color: #555;
      text-decoration: none;
      font-size: 14px;
    }

    .link:hover {
      text-decoration: underline;
    }

    .mensaje {
      text-align: center;
      margin-bottom: 1rem;
      font-size: 14px;
      color: green;
    }

    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Crear Cuenta</h2>

    <?php if ($mensaje): ?>
      <div class="mensaje <?php echo strpos($mensaje, 'Error') !== false ? 'error' : ''; ?>">
        <?php echo $mensaje; ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="text" name="usuario" placeholder="Nombre de usuario" required />
      <input type="email" name="correo" placeholder="Correo electrónico" required />
      <input type="password" name="contrasena" placeholder="Contraseña" required />
      <button type="submit">Registrarse</button>
    </form>
    <a class="link" href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
  </div>
</body>
</html>


