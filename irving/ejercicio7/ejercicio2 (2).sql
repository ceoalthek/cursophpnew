-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2018 a las 21:11:43
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_captura` ()  BEGIN
		SELECT *
        FROM captura;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_captura` (IN `name` VARCHAR(255), IN `archivo` VARCHAR(255))  BEGIN
    	INSERT INTO captura(nombre,imagen) VALUES (name, archivo);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `name` VARCHAR(255), IN `contrasena` VARCHAR(255))  BEGIN
		SELECT *
        FROM usuario
        WHERE
        	usuario.user = name AND
            usuario.pass = contrasena;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura`
--

CREATE TABLE `captura` (
  `idCaptura` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ;

--
-- Volcado de datos para la tabla `captura`
--

INSERT INTO `captura` (`idCaptura`, `nombre`, `imagen`) VALUES
(2, '121323', 'archivos/83.png'),
(3, 'eniek', 'archivos/83.png'),
(4, 'chayo', 'archivos/12.png'),
(6, 'kike', 'archivos/35.png'),
(7, 'kike', 'archivos/35.png'),
(8, 'SIMON', 'archivos/89.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUduario` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `explorador` varchar(255) NOT NULL
) ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUduario`, `user`, `pass`, `ip`, `explorador`) VALUES
(1, '5e4d614d1c5e99716f23462a4e6aba4d', '827ccb0eea8a706c4c34a16891f84e7b', '', ''),
(2, 'aa47f8215c6f30a0dcdb2a36a9f4168e', '827ccb0eea8a706c4c34a16891f84e7b', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `captura`
--
ALTER TABLE `captura`
  ADD PRIMARY KEY (`idCaptura`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUduario`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `captura`
--
ALTER TABLE `captura`
  MODIFY `idCaptura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUduario` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
