-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2016 a las 02:55:32
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
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_escuela` varchar(100) DEFAULT NULL,
  `localidad` varchar(70) DEFAULT NULL,
  `curso_anio` int(3) DEFAULT NULL,
  `curso_letra` varchar(3) DEFAULT NULL,
  `cant_alumnos` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_escuela`, `localidad`, `curso_anio`, `curso_letra`, `cant_alumnos`, `fecha_creacion`) VALUES
(1, 'conrado nale roxlo nro 172', 'isidro casanova', 1, 'A', 12, NULL),
(2, 'conrado nale roxlo nro 172', 'isidro casanova', 1, 'A', 12, NULL),
(3, 'w', 'q', 1, 'A', 12, NULL),
(4, 'nanananananananananaanan', 'nanananananananananananan', 1, 'A', 12, NULL),
(5, 'nan', 'nanananananananananananan', 1, 'A', 12, '2016-06-18 00:00:00'),
(6, 'nafrt', 'nanananananananananananan', 1, 'A', 12, '0000-00-00 00:00:00'),
(7, 'nafrt', 'nanananananananananananan', 1, 'A', 12, '2016-06-17 00:00:00'),
(8, 'nafrt', 'nanananananananananananan', 1, 'A', 12, '0000-00-00 00:00:00'),
(9, 'ultimo', 'nanananananananananananan', 1, 'A', 34, '2016-06-18 00:00:00'),
(10, 'ultimoconhora', 'nanananananananananananan', 1, 'A', 34, '2016-06-18 00:14:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
