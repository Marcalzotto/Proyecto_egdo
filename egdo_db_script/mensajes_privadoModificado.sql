-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2016 a las 00:32:43
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `egdo_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_privado`
--

CREATE TABLE IF NOT EXISTS `mensajes_privado` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(45) DEFAULT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_emisor` int(11) DEFAULT NULL,
  `id_receptor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `mensajes_privado`
--

INSERT INTO `mensajes_privado` (`id_mensaje`, `asunto`, `mensaje`, `fecha_hora`, `id_emisor`, `id_receptor`) VALUES
(1, 'hola marcos soy pau', 'msj de paula a marcos', '2016-07-05 02:17:08', 4, 3),
(2, 'hola pau soy marcos', 'msj de marcos a paula', '2016-07-06 06:12:29', 3, 4),
(3, 'hola noe soy romy', 'msj de romy a noe', '2016-07-07 05:26:41', 2, 1),
(5, 'hola noe soy paula', 'msj de paula a noe', '2016-07-03 18:37:53', 4, 1),
(6, 'hola noe soy marcos', 'msj de marcos a noe', '2016-07-06 06:12:29', 3, 1),
(7, 'vamos!!!!!!!!!!!!!', 'msj de pruebaaaa', '0000-00-00 00:00:00', 1, 0),
(8, 'jskjasjdnkajn', 'ddasdnkajdnksajsndk', '2016-07-08 18:09:40', 1, 0),
(9, 'm,m,', 'm,m,m,m,m,m,m,m,m', '2016-07-08 19:31:32', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
