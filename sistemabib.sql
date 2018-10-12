-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2018 a las 00:33:32
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemabib`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `Id_Autor` int(3) NOT NULL,
  `Nombres` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`Id_Autor`, `Nombres`, `Apellidos`) VALUES
(1, 'Diego', 'Saravia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Id_Categoria` int(2) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Id_Categoria`, `Nombre`) VALUES
(1, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `Id_Libro` int(3) NOT NULL,
  `Nombre_Libro` varchar(255) NOT NULL,
  `Descripcion` varchar(10000) NOT NULL,
  `Existencia` int(2) NOT NULL,
  `Puntuacion` int(3) NOT NULL,
  `Id_Autor` int(3) NOT NULL DEFAULT '0',
  `Id_Categoria` int(3) NOT NULL,
  `Imagen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`Id_Libro`, `Nombre_Libro`, `Descripcion`, `Existencia`, `Puntuacion`, `Id_Autor`, `Id_Categoria`, `Imagen`) VALUES
(2, 'Harry Potter Y La Orden Del Fénix', 'Esta es una descripción de ejemplo para Harry Potter y la orden del fénix y tiene que ser algo medianamente largo para que el navegador tenga problemas a la hora de ordenarlo todo.', 10, 0, 1, 1, 'Fénix.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `Id_Sexo` int(2) NOT NULL,
  `Nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`Id_Sexo`, `Nombre`) VALUES
(11, 'Hombre'),
(12, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(5) NOT NULL,
  `Nombres` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Apodo` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Edad` int(2) NOT NULL,
  `Id_Sexo` int(11) NOT NULL,
  `Permisos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombres`, `Apellidos`, `Apodo`, `Password`, `Email`, `FechaNacimiento`, `Edad`, `Id_Sexo`, `Permisos`) VALUES
(5, 'Diego Jos&eacute;', 'Saravia Zalda&ntilde;a', 'ZM05', '$2y$12$9OioTLZeQgrOdjoGDux71.rTufDAGjb82oQAR9DL/d2c05/oNaJ5m', 'saravia__2000@hotmail.com', '2000-11-11', 18, 11, 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`Id_Autor`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`Id_Libro`),
  ADD KEY `Id_Autor` (`Id_Autor`),
  ADD KEY `Id_Categoria` (`Id_Categoria`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`Id_Sexo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Id_Sexo` (`Id_Sexo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `Id_Autor` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `Id_Libro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Id_Autor`) REFERENCES `autores` (`Id_Autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`Id_Categoria`) REFERENCES `categorias` (`Id_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_Sexo`) REFERENCES `sexos` (`Id_Sexo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
