-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2025 a las 23:02:39
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
-- Base de datos: `plantilla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nombre`, `apellido`, `email`, `contrasena`, `fecha_nacimiento`) VALUES
(16, 'prueba2', 'hash', 'correoejemplo2@gmail.com', '$2y$10$MO2WORFtlkkOn/Fe/MKrTenSIPiABGVLzYqNPbZ.Db8VFcSCKjyyC', '2025-02-27'),
(17, 'prueba3', 'hash', 'correoejemplo4@gmail.com', '$2y$10$foVdSwme9ie.3UCJqXLeJ.H/St.F3OQEmt7w1BVj7ICc/mzz44Ukm', '2025-02-20'),
(18, 'Administrador', 'General', 'admin@admin.com', '$2y$10$bFS3U0QXeBHUMnIZlqergOPc0gqVfAn.zBgM2yIOcdkX4JbM7Ste2', '2025-02-26'),
(19, 'Administrador', 'General 2', 'admin2@admin.com', '$2y$10$y1uSC0SaGeblyQc1Q6kohuzl1mOwFqaHjvT93mvfNgCY7gjhmjCSO', '2025-02-27'),
(20, 'yom', 'yom', 'yomaeuan@gmail.como', '$2y$10$kpebOoKSJ.Zbgvii6TyGcuN0KEn1BXPjuqSjo1vNqJjcIQuwFXyVi', '2025-02-27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
