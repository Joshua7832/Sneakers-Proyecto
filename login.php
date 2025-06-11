<?php
session_start();
include 'db.php'; // Asegúrate que esta ruta sea correcta

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
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iniciar Sesión | Sneakers</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
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

    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border: 1px solid #ddd;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 24px;
    }

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

    .error {
      color: red;
      text-align: center;
      margin-bottom: 1rem;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    
    <?php if (!empty($error)): ?>
      <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
      <input type="email" name="email" placeholder="Correo electrónico"  />
      <input type="password" name="password" placeholder="Contraseña" required />
      <button type="submit">Entrar</button>
    </form>
    <a class="link" href="registro.php">¿No tienes cuenta? Regístrate</a>
  </div>
</body>
</html>


