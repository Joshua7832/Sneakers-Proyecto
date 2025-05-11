-- Crear base de datos y tabla de productos
CREATE DATABASE IF NOT EXISTS tienda;
USE tienda;

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    precio DECIMAL(10,2)
);

INSERT INTO productos (nombre, descripcion, precio) VALUES
('Producto 1', 'Descripción del producto 1', 10.00),
('Producto 2', 'Descripción del producto 2', 15.50),
('Producto 3', 'Descripción del producto 3', 20.99);