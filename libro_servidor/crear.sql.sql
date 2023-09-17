-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-12-2018 a las 11:05:09
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `doctrine`
--
CREATE DATABASE IF NOT EXISTS `doctrine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `doctrine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `salario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `salario`) VALUES
(1, 'Antonio', 'Luna', 2000),
(2, 'Ana', 'Puertas', 2000),
(3, 'Juan', 'Sevilla', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_proyectos`
--

CREATE TABLE `empleado_proyectos` (
  `id` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_proyectos`
--

INSERT INTO `empleado_proyectos` (`id`, `empleado`, `proyecto`) VALUES
(5, 1, 1),
(2, 1, 2),
(1, 2, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fundacion` int(11) NOT NULL,
  `socios` int(11) NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre`, `fundacion`, `socios`, `ciudad`) VALUES
(1, 'Real Madrid', 1900, 70000, 'Madrid'),
(2, 'Barcelona', 1899, 50000, 'Barcelona\r\n'),
(3, 'Sevilla F. C. ', 1910, 10000, 'Sevilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`Id`, `Nombre`, `Apellidos`, `Edad`, `Equipo`) VALUES
(1, 'Manuel', 'Luna', 12, 1),
(2, 'Juan', 'Puertas', 25, 1),
(3, 'Pedro', 'Linares', 22, 3),
(4, 'Jordi', 'Abreu', 22, 2),
(5, 'Alberto', 'Peine', 33, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `id` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `visitante` int(11) NOT NULL,
  `goles_local` int(11) NOT NULL,
  `goles_visitante` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id`, `local`, `visitante`, `goles_local`, `goles_visitante`, `fecha`) VALUES
(1, 1, 2, 1, 1, '2018-01-01'),
(2, 1, 3, 2, 2, '2018-12-17'),
(3, 1, 2, 2, 2, '2018-12-02'),
(4, 3, 2, 4, 4, '2018-06-13'),
(5, 2, 3, 0, 0, '2019-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `presupuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre`, `presupuesto`) VALUES
(1, 'Tunel Burgos', 10000),
(2, 'Puente Madrid', 50000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado_proyectos`
--
ALTER TABLE `empleado_proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado` (`empleado`,`proyecto`),
  ADD KEY `proyecto` (`proyecto`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Equipo` (`Equipo`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local` (`local`),
  ADD KEY `visitante` (`visitante`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado_proyectos`
--
ALTER TABLE `empleado_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado_proyectos`
--
ALTER TABLE `empleado_proyectos`
  ADD CONSTRAINT `empleado_proyectos_ibfk_1` FOREIGN KEY (`empleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `empleado_proyectos_ibfk_2` FOREIGN KEY (`proyecto`) REFERENCES `proyecto` (`id`);

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`Equipo`) REFERENCES `equipo` (`id`);

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `partido_ibfk_1` FOREIGN KEY (`local`) REFERENCES `equipo` (`id`),
  ADD CONSTRAINT `partido_ibfk_2` FOREIGN KEY (`visitante`) REFERENCES `equipo` (`id`);
--
-- Base de datos: `empresa`
--
CREATE DATABASE IF NOT EXISTS `empresa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `empresa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `CodDept` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Jefe` int(11) DEFAULT NULL,
  `Presupuesto` int(11) NOT NULL,
  `Ciudad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`CodDept`, `Nombre`, `Jefe`, `Presupuesto`, `Ciudad`) VALUES
(3, 'Ventas', 1, 1004, 'Sevilla'),
(4, 'Gerencia', NULL, 2000, 'Lugo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `CodEmple` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido1` varchar(20) NOT NULL,
  `Apellido2` varchar(20) NOT NULL,
  `Departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`CodEmple`, `Nombre`, `Apellido1`, `Apellido2`, `Departamento`) VALUES
(1, 'Ana', 'Fuentes', 'Teruel', 3),
(2, 'Luis', 'Marea', 'Motos', 3),
(4, 'Antonio', 'Hoz', 'Perales', 4),
(5, 'Eloisa', 'Puertas', 'Torres', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Clave`, `Rol`) VALUES
(1, 'ana', '1234', 1),
(3, 'paco', '1234', 0),
(4, 'Pedro', '33333', 0),
(20, 'Luisa', '2222', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`CodDept`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD KEY `Jefe` (`Jefe`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`CodEmple`),
  ADD KEY `Departamento` (`Departamento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Nombre_2` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `CodDept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `CodEmple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`Jefe`) REFERENCES `empleados` (`CodEmple`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`CodDept`);
--
-- Base de datos: `pedidos`
--
CREATE DATABASE IF NOT EXISTS `pedidos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pedidos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CodCat` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CodCat`, `Nombre`, `Descripcion`) VALUES
(1, 'Comida', 'Platos e ingredientes'),
(2, 'Bedidas sin', 'Bebidas sin alcohol'),
(3, 'Bebidas con', 'Bebidas con alcohol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `CodPed` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Enviado` int(11) NOT NULL,
  `Restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`CodPed`, `Fecha`, `Enviado`, `Restaurante`) VALUES
(79, '2018-12-20 15:50:33', 0, 1),
(80, '2018-12-20 15:51:41', 0, 1),
(81, '2018-12-20 16:41:13', 0, 1),
(82, '2018-12-20 17:29:39', 0, 1),
(83, '2018-12-20 23:13:23', 0, 1),
(84, '2018-12-20 23:14:07', 0, 1),
(85, '2018-12-20 23:15:02', 0, 1),
(86, '2018-12-24 10:56:29', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosproductos`
--

CREATE TABLE `pedidosproductos` (
  `CodPedProd` int(11) NOT NULL,
  `Pedido` int(11) NOT NULL,
  `Producto` int(11) NOT NULL,
  `Unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidosproductos`
--

INSERT INTO `pedidosproductos` (`CodPedProd`, `Pedido`, `Producto`, `Unidades`) VALUES
(65, 79, 5, 1),
(66, 79, 2, 4),
(67, 80, 5, 1),
(68, 81, 3, 1),
(69, 81, 4, 1),
(70, 82, 6, 1),
(71, 82, 3, 1),
(72, 83, 5, 1),
(73, 84, 5, 1),
(74, 85, 3, 1),
(75, 86, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `CodProd` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(90) NOT NULL,
  `Peso` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`CodProd`, `Nombre`, `Descripcion`, `Peso`, `Stock`, `Categoria`) VALUES
(1, 'Harina', '8 paquetes de 1kg de harina cada uno', 8, 94, 1),
(2, 'Sal', '20 paquetes de 1kg cada uno', 20, 3, 1),
(3, 'Agua 0.5', '100 botellas de 0.5 litros cada una', 51, 85, 2),
(4, 'Agua 1.5', '20 botellas de 1.5 litros cada una', 31, 45, 2),
(5, 'Cerveza Alhambra tercio', '24 botellas de 33cl', 10, 12, 3),
(6, 'Vino tinto Rioja 0.75', '6 botellas de 0.75 ', 5.5, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `CodRes` int(11) NOT NULL,
  `Correo` varchar(90) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `Pais` varchar(45) NOT NULL,
  `CP` int(5) DEFAULT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`CodRes`, `Correo`, `Clave`, `Pais`, `CP`, `Ciudad`, `Direccion`, `Rol`) VALUES
(1, 'madrid1@empresa.com', '1234', 'España', 28002, 'Madrid', 'C/ Padre  Claret, 8', 1),
(2, 'cadiz1@empresa.com', '1234', 'España', 11001, 'Cádiz', 'C/ Portales, 2 ', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CodCat`),
  ADD UNIQUE KEY `UN_NOM_CAT` (`Nombre`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`CodPed`),
  ADD KEY `Restaurante` (`Restaurante`);

--
-- Indices de la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  ADD PRIMARY KEY (`CodPedProd`),
  ADD KEY `CodPed` (`Pedido`),
  ADD KEY `CodProd` (`Producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CodProd`),
  ADD KEY `Categoria` (`Categoria`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`CodRes`),
  ADD UNIQUE KEY `UN_RES_COR` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CodCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `CodPed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  MODIFY `CodPedProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `CodProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `CodRes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`Restaurante`) REFERENCES `restaurantes` (`CodRes`);

--
-- Filtros para la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  ADD CONSTRAINT `pedidosproductos_ibfk_1` FOREIGN KEY (`Pedido`) REFERENCES `pedidos` (`CodPed`),
  ADD CONSTRAINT `pedidosproductos_ibfk_2` FOREIGN KEY (`Producto`) REFERENCES `productos` (`CodProd`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`CodCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
