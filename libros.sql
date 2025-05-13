-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2025 a las 20:58:23
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
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID_autor` int(11) NOT NULL,
  `nombre_autor` varchar(50) NOT NULL,
  `pais_autor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID_autor`, `nombre_autor`, `pais_autor`) VALUES
(2, 'Mario', 'Mexico'),
(3, 'Maria', 'Argentina'),
(4, 'Alexa', 'Alemana'),
(5, 'Gabriel García Márquez	', 'Mexico'),
(6, 'George Orwell	', 'Estados Unidos'),
(7, 'Carlos Ruiz Zafón	', 'Mexico'),
(8, 'Paulo Coelho	', 'España'),
(9, 'F. Scott Fitzgerald', 'Estados Unidos'),
(10, 'Yuval Noah Harari', 'Brazil'),
(11, 'José Saramago	', 'Mexico'),
(12, 'Patrick Rothfuss', 'Inglaterra'),
(13, 'Isabel Allende	', 'Mexico'),
(14, 'N. Gregory Mankiw	', 'Francia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `ID_carrera` int(10) NOT NULL,
  `nombre_carrera` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID_carrera`, `nombre_carrera`) VALUES
(1, 'Sistemas'),
(2, 'Literatura'),
(3, 'Ciencias Sociales'),
(4, 'Filosofía'),
(5, 'Desarrollo personal'),
(6, 'Historia'),
(7, 'Literatura fantástica'),
(8, 'Economía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_libro` int(5) NOT NULL,
  `titulo_libro` varchar(100) NOT NULL,
  `autor` int(10) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `carrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID_libro`, `titulo_libro`, `autor`, `anio`, `editorial`, `carrera`) VALUES
(3, 'Cien años de soledad', 3, '1998', 'MundoLibro', 2),
(4, '1984', 6, '1949', 'Secker & Warburg', 4),
(5, 'La sombra del viento	', 7, '2001', 'Planeta', 2),
(6, 'El alquimista	', 8, '1988', 'HarperCollins', 3),
(7, 'El gran Gatsby', 9, '1925', 'Charles Scribner Sons', 2),
(8, 'Sapiens: De animales a dioses', 10, '2011', 'Editorial Debate', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(10) NOT NULL,
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
(17, 'prueba3', 'hash', 'correoejemplo4@gmail.com', '$2y$10$foVdSwme9ie.3UCJqXLeJ.H/St.F3OQEmt7w1BVj7ICc/mzz44Ukm', '2025-02-20'),
(18, 'Administrador', 'General', 'admin@admin.com', '$2y$10$bFS3U0QXeBHUMnIZlqergOPc0gqVfAn.zBgM2yIOcdkX4JbM7Ste2', '2025-02-26'),
(20, 'yom', 'yom', 'yomaeuan@gmail.como', '$2y$10$kpebOoKSJ.Zbgvii6TyGcuN0KEn1BXPjuqSjo1vNqJjcIQuwFXyVi', '2025-02-27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID_autor`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`ID_carrera`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID_libro`),
  ADD KEY `Fk_autores` (`autor`),
  ADD KEY `FK_carreras` (`carrera`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `ID_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `ID_carrera` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID_libro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`ID_carrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `autores` (`ID_autor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
