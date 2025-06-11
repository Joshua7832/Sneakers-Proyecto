<?php
// Este archivo se puede incluir en varias páginas como encabezado
?>

<style>
  header {
    background-color: #000;
    padding: 1rem 2rem;
    color: white;
    font-family: 'Inter', sans-serif;
  }

  nav {
    display: flex;
    justify-content: center;
    gap: 2rem;
  }

  nav a {
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
  }

  nav a:hover {
    color: #aaa;
  }
</style>

<header>
  <nav>
    <a href="index.php">Inicio</a>
    <a href="productos.php">Productos</a>
    <a href="carrito.php">Carrito</a>
  </nav>
</header>

