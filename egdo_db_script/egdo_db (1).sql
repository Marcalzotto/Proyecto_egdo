-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2016 a las 22:10:50
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `egdo_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `icono` tinyblob,
  `color` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_calificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_disenio`
--

CREATE TABLE `codigo_disenio` (
  `id_codigo_disenio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_codigo_disenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_escuela` varchar(45) DEFAULT NULL,
  `numero_escuela` int(11) DEFAULT NULL,
  `localidad` varchar(70) DEFAULT NULL,
  `nombre_curso` varchar(45) DEFAULT NULL,
  `cant_alumnos` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disenio`
--

CREATE TABLE `disenio` (
  `id_disenio` int(11) NOT NULL AUTO_INCREMENT,
  `id_codigo_disenio` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `disenio` mediumblob,
  `id_usuario` int(11) DEFAULT NULL,
  `id_votacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_disenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `partido` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pagina_web` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `instagram` varchar(45) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `cuit` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `imagen1` mediumblob,
  `imagen2` mediumblob,
  `id_actividad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiesta`
--

CREATE TABLE `fiesta` (
  `id_fiesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `pagina_web` varchar(45) DEFAULT NULL,
  `datelles_adicionales` varchar(250) DEFAULT NULL,
  `imagen1` mediumblob,
  `imagen2` mediumblob,
  `id_votacion` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_usuario_propuesta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fiesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_imagen` varchar(45) DEFAULT NULL,
  `tamanio` decimal(6,2) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `ancho` int(11) DEFAULT NULL,
  `alto` int(11) DEFAULT NULL,
  `imagen` mediumblob,
  `portada` tinyint(1) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_viaje`
--

CREATE TABLE `info_viaje` (
  `id_info_viaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_lugar` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_info_viaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_privado`
--

CREATE TABLE `mensajes_privado` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(45) DEFAULT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_emisor` int(11) DEFAULT NULL,
  `id_receptor` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `resumen` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL DEFAULT '0',
  `descripcion_rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upd`
--

CREATE TABLE `upd` (
  `id_upd` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_lugar` varchar(45) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `localidad` varchar(60) DEFAULT NULL,
  `partido` varchar(60) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `pagina_web` varchar(45) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `datelles_adicionales` varchar(250) DEFAULT NULL,
  `imagen1` mediumblob,
  `imagen2` mediumblob,
  `id_actividad` int(11) DEFAULT NULL,
  `id_votacion` int(11) DEFAULT NULL,
  `id_usuario_propuesta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_upd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(256) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_actividad`
--

CREATE TABLE `usuario_has_actividad` (
  `id_notificacion` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
   PRIMARY KEY (`id_notificacion`,`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE `votacion` (
  `id_votacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_apertura` datetime DEFAULT NULL,
  `estado_votacion` varchar(45) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_votacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `disenio`
--
ALTER TABLE `disenio`
  ADD CONSTRAINT `disenio_ibfk_1` FOREIGN KEY (`id_codigo_disenio`) REFERENCES `codigo_disenio` (`id_codigo_disenio`),
  ADD CONSTRAINT `disenio_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `fiesta`
--
ALTER TABLE `fiesta`
  ADD CONSTRAINT `fiesta_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `info_viaje`
--
ALTER TABLE `info_viaje`
  ADD CONSTRAINT `info_viaje_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `mensajes_privado`
--
ALTER TABLE `mensajes_privado`
  ADD CONSTRAINT `mensajes_privado_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `upd`
--
ALTER TABLE `upd`
  ADD CONSTRAINT `upd_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `usuario_has_actividad`
--
ALTER TABLE `usuario_has_actividad`
  ADD CONSTRAINT `usuario_has_actividad_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `usuario_has_actividad_ibfk_1` FOREIGN KEY (`id_notificacion`) REFERENCES `notificaciones` (`id_notificacion`);

--
-- Filtros para la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD CONSTRAINT `votacion_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
