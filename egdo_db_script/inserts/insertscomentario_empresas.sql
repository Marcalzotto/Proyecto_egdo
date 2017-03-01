-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2017 a las 13:08:18
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.12

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
-- Estructura de tabla para la tabla `comentario_empresas`
--

CREATE TABLE IF NOT EXISTS `comentario_empresas` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(2000) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_comentario`),
  KEY `comentario_empresas_ibfk_2` (`id_usuario`),
  KEY `comentario_empresas_ibfk_1` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `comentario_empresas`
--

INSERT INTO `comentario_empresas` (`id_comentario`, `comentario`, `id_empresa`, `id_usuario`, `fecha`, `estado_moderar`) VALUES
(14, 'Recomendable. ', 1, 6, '2016-12-15 19:09:00', 1),
(15, 'Cumplen a tiempo con el pedido', 1, 6, '2016-12-15 19:09:00', 0),
(16, 'No la recoemiendo, error en el pedido, color y talles', 1, 7, '2017-02-10 21:06:00', 0),
(17, 'Tardan mucho.', 1, 6, '2017-02-19 21:31:00', 0),
(18, 'holaaaaaaaaaaaaaaaaaaaaaa holaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaa', 1, 6, '2017-02-19 21:31:00', 0),
(19, 'Recomnable.', 2, 19, '2017-03-01 00:00:00', 0),
(20, 'cumplen con el pedido.', 2, 20, '2017-03-01 00:00:00', 0),
(21, 'No la recomiendo.', 3, 11, '2017-03-01 00:00:00', 0),
(22, 'Es horrible la calidad y confeccion.', 3, 20, '2017-03-01 00:00:00', 0),
(23, 'No la recomiendo.', 3, 11, '2017-03-01 00:00:00', 0),
(24, 'Es horrible la calidad y confeccion.', 3, 20, '2017-03-01 00:00:00', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario_empresas`
--
ALTER TABLE `comentario_empresas`
  ADD CONSTRAINT `comentario_empresas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_empresas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
