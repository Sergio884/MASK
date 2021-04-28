-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-04-2021 a las 22:44:09
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `MASK`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificacion`
--

CREATE TABLE `Calificacion` (
  `IdCalificacion` int(11) NOT NULL,
  `Comentario` text NOT NULL,
  `Calificacion` float NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdInmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Favoritos`
--

CREATE TABLE `Favoritos` (
  `IdFavoritos` int(11) NOT NULL,
  `IdInmueble` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inmueble`
--

CREATE TABLE `Inmueble` (
  `IdInmueble` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `VentaRenta` tinyint(1) NOT NULL,
  `Costo` float NOT NULL,
  `Moneda` tinyint(4) NOT NULL,
  `Estado` varchar(25) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `Logitud` double DEFAULT NULL,
  `Latitud` double DEFAULT NULL,
  `NumeroDormitorios` tinyint(4) NOT NULL DEFAULT 0,
  `NumeroBanios` tinyint(4) NOT NULL DEFAULT 0,
  `MetrosCuadrados` float NOT NULL,
  `Descripcion` text NOT NULL,
  `Visitas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `InmuebleFoto`
--

CREATE TABLE `InmuebleFoto` (
  `IdFoto` int(11) NOT NULL,
  `IdInmueble` int(11) NOT NULL,
  `Foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Nivel` tinyint(4) DEFAULT 1,
  `Nombres` varchar(75) NOT NULL,
  `Apellidos` varchar(75) NOT NULL,
  `Calificacion` float NOT NULL,
  `Edad` date NOT NULL,
  `FotoUsuario` longblob NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `NumeroCalificados` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Calificacion`
--
ALTER TABLE `Calificacion`
  ADD PRIMARY KEY (`IdCalificacion`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdInmueble` (`IdInmueble`);

--
-- Indices de la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  ADD PRIMARY KEY (`IdFavoritos`),
  ADD KEY `IdInmueble` (`IdInmueble`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `Inmueble`
--
ALTER TABLE `Inmueble`
  ADD PRIMARY KEY (`IdInmueble`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `InmuebleFoto`
--
ALTER TABLE `InmuebleFoto`
  ADD PRIMARY KEY (`IdFoto`),
  ADD KEY `IdInmueble` (`IdInmueble`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Calificacion`
--
ALTER TABLE `Calificacion`
  MODIFY `IdCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  MODIFY `IdFavoritos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Inmueble`
--
ALTER TABLE `Inmueble`
  MODIFY `IdInmueble` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `InmuebleFoto`
--
ALTER TABLE `InmuebleFoto`
  MODIFY `IdFoto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Calificacion`
--
ALTER TABLE `Calificacion`
  ADD CONSTRAINT `Calificacion_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`),
  ADD CONSTRAINT `Calificacion_ibfk_2` FOREIGN KEY (`IdInmueble`) REFERENCES `Inmueble` (`IdInmueble`);

--
-- Filtros para la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  ADD CONSTRAINT `Favoritos_ibfk_1` FOREIGN KEY (`IdInmueble`) REFERENCES `Inmueble` (`IdInmueble`),
  ADD CONSTRAINT `Favoritos_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`);

--
-- Filtros para la tabla `Inmueble`
--
ALTER TABLE `Inmueble`
  ADD CONSTRAINT `Inmueble_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`);

--
-- Filtros para la tabla `InmuebleFoto`
--
ALTER TABLE `InmuebleFoto`
  ADD CONSTRAINT `InmuebleFoto_ibfk_1` FOREIGN KEY (`IdInmueble`) REFERENCES `Inmueble` (`IdInmueble`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
