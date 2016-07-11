-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2016 a las 05:28:31
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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(256) DEFAULT NULL,
  `fechaAltaUsuario` datetime NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_confirmacion` varchar(100) NOT NULL,
  `estadoActivacion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  UNIQUE KEY `email` (`email`),
  KEY `id_rol` (`id_rol`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `contrasenia`, `fechaAltaUsuario`, `id_rol`, `id_curso`, `id_confirmacion`, `estadoActivacion`) VALUES
(1, 'Noelia', 'Morel', 'noe@egdo.com', '$2y$10$2xooZFK2pLKzLs0SXj1xb.ClC1CxIWmVJjt9SAEEFtzwGOxaoqN0m', '0000-00-00 00:00:00', 1, NULL, '0', 0),
(2, 'Romina', 'Velasco', 'romy@egdo.com', '$2y$10$fe4F.UXndVqbKzpTtcuAn.sTEM8NtoXOyQ80Zsjw2kkdpjZPLhSku', '0000-00-00 00:00:00', 1, NULL, '0', 0),
(3, 'Marcos', 'Scalzotto', 'mar@egdo.com', '$2y$10$mrw6qL8YQ1HJQB558IotxeygRWYXSyeH38yzr.TciwLKHkui/246e', '0000-00-00 00:00:00', 1, NULL, '0', 0),
(4, 'Paula', 'Neri', 'pau@egdo.com', '$2y$10$2WM7X14LYBGQrO.PdNb52OEsybRcR/5fSK48acVUaN92XLXDVMzUe', '0000-00-00 00:00:00', 1, NULL, '0', 0),
(5, 'Jose', 'Perez', 'jose@egdo.com', '$2y$10$LF54wX9dJ95n7Wxc5YsQve8T/wDOjyFVsX/he8ptwVLgN1Am.q0nm', '0000-00-00 00:00:00', 2, NULL, '0', 0),
(6, 'Matias', 'Ruiz', 'mati@egdo.com', '$2y$10$B6Zq0fxWcz3ks1Kcfa2zQe1vAhEC5ZOrrgReSKaMOP0gqCVFdP2m2', '0000-00-00 00:00:00', 3, NULL, '0', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
