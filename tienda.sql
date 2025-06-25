-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2025 a las 03:42:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(24, 'Nike Air Force 1 \'07 LV8', '', 2799.00, 'img/Tenis/T1.jpg'),
(25, 'Nike Air Force 1 Low Canvas', '', 3000.00, 'img/Tenis/T2.jpg'),
(26, 'Nike Air Max Nuaxis', '', 2999.00, 'img/Tenis/T3.jpg'),
(27, 'Nike Charge Canvas', '', 1259.00, 'img/Tenis/T4.jpg'),
(28, 'Nike Dunk Low Retro SE', '', 2499.00, 'img/Tenis/T5.jpg'),
(29, 'Nike Free Golf NN', '', 1919.00, 'img/Tenis/T6.jpg'),
(30, 'Nike Grandstand II', '', 1799.00, 'img/Tenis/T7.jpg'),
(31, 'Nike Lunar Roam', '', 2239.00, 'img/Tenis/T8.jpg'),
(32, 'Nike SB Zoom Blazer Mid', '', 1539.00, 'img/Tenis/T9.jpg'),
(33, 'Nike V2K Run', '', 2599.00, 'img/Tenis/T10.jpg'),
(34, 'Nike Vapor Lite 3', '', 1889.00, 'img/Tenis/T11.jpg'),
(35, 'Nike Waffle Debut', '', 1799.00, 'img/Tenis/T13.jpg'),
(36, 'Nike Air Pegasus Wave Premium Sail and Coconut Milk', '', 2039.00, 'img/Tenis/T14.jpg'),
(38, '	Nike Gato \'White and Gym Red\'', '', 2399.00, 'img/Tenis/T12.jpg'),
(40, 'Nike Air Max Nuaxis', 'Tenis nonitos', 4000.00, 'img/Tenis/T5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'Joshua ', 'joshuaalvarezrodriguez@gmail.com', '$2y$10$tQQYuoDUU6KavrjL1Qrise.nyBk1IWjEzHG60PFw.nCPkxHZmNHBS'),
(4, 'ivan', 'ivandiaz.cont@gmail.com', '$2y$10$IsL.hMvhd1ZSE0KQRQddNub05RmSkCQiFENVvN2lS0FAB2vhX1nVe'),
(5, 'admin2', 'admin2@gmail.com', '$2y$10$ec4ygWQg4Yzio7CrcLLY.OTQO5wxiUTPXN1bao07VkHPbSDusI1Em'),
(6, 'kevin', 'kevin@gmail.com', '$2y$10$2nzuUrCZ4FMxYrDxS1rqu.9JECeeJkrqNxKXRMk.b7aso1fLvuqva'),
(7, 'joshua', 'joshua@outlook', '$2y$10$8nOeBPXtN.heU9XXMi.ixeqf3l.B8XmQqJBwkW5CXZR4uTNqaI13q');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
