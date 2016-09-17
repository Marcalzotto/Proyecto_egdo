/*create database egdo_db;
use egdo_db;*/
-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2016 a las 06:55:35
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
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

/*INSERT INTO `actividad` (`id_actividad`, `nombre_actividad`) VALUES
(1, 'info-viaje');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `icono` tinyblob,
  `color` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `id_calificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_calificacion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_disenio`
--

CREATE TABLE IF NOT EXISTS `codigo_disenio` (
  `id_codigo_disenio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_codigo_disenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_escuela` varchar(45) DEFAULT NULL,
  `localidad` varchar(70) DEFAULT NULL,
  `curso_anio` int(3) DEFAULT NULL,
  `curso_letra` varchar(3) DEFAULT NULL,
  `cant_alumnos` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disenio`
--

CREATE TABLE IF NOT EXISTS `disenio` (
  `id_disenio` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo` int(11) NOT NULL,
  `disenio_frontal` mediumblob NOT NULL,
  `ancho_frontal` smallint(3) NOT NULL,
  `alto_frontal` smallint(3) NOT NULL,
  `nombre_imagen` varchar(50) NOT NULL,
  `tipo_frontal` varchar(20) NOT NULL,
  `disenio_impresion` mediumblob NOT NULL,
  `ancho_impresion` smallint(3) NOT NULL,
  `alto_impresion` smallint(3) NOT NULL,
  `nombre_impresion` varchar(50) NOT NULL,
  `tipo_impresion` varchar(20) NOT NULL,
  `id_usuario_subio` int(11) NOT NULL,
  `id_votacion` int(11) NOT NULL,
  `cantidad_votos` int(11) NOT NULL,
  `votos_segunda_instancia` int(11) NOT NULL,
  `votacion_pertenece` int(11) NOT NULL,
  PRIMARY KEY (`id_disenio`),
  KEY `codigo_tipo` (`codigo_tipo`),
  KEY `votacion_pertenece` (`votacion_pertenece`),
  KEY `id_votacion` (`id_votacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
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
  `fecha_alta` date DEFAULT NULL,
  `cuit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `imagen1` mediumblob,
  `imagen2` mediumblob,
  `id_actividad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiesta`
--

CREATE TABLE IF NOT EXISTS `fiesta` (
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
  PRIMARY KEY (`id_fiesta`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
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
  PRIMARY KEY (`id_imagen`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_viaje`
--

CREATE TABLE IF NOT EXISTS `info_viaje` (
  `id_info_viaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_lugar` varchar(45) DEFAULT NULL,
  `imagen` mediumblob,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_info_viaje`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id_mensaje`),
  KEY `id_emisor` (`id_emisor`),
  KEY `id_receptor` (`id_receptor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `resumen` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL DEFAULT '0',
  `descripcion_rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

/*INSERT INTO `rol` (`id_rol`, `descripcion_rol`) VALUES
(0, 'Administrador');*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upd`
--

CREATE TABLE IF NOT EXISTS `upd` (
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
  PRIMARY KEY (`id_upd`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  KEY `id_curso` (`id_curso`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

/*INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `contrasenia`, `fechaAltaUsuario`, `id_rol`, `id_curso`, `id_confirmacion`, `estadoActivacion`) VALUES
(1, 'Romina', 'Giselle', 'rosse_velasco28@hotmail.com', 'rosse', '2016-07-07 00:00:00', 0, NULL, '', 1);
*/
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_actividad`
--

CREATE TABLE IF NOT EXISTS `usuario_has_actividad` (
  `id_notificacion` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  PRIMARY KEY (`id_notificacion`,`id_actividad`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE IF NOT EXISTS `votacion` (
  `id_votacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_apertura` datetime NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `tipo_actividad` int(11) NOT NULL,
  `usuario_apertura` int(11) NOT NULL,
  `curso_pertenece_votacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_votacion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `usuario_apertura` (`usuario_apertura`),
  KEY `curso_pertenece_votacion` (`curso_pertenece_votacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE IF NOT EXISTS `votos` (
  `voto` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_voto` int(11) NOT NULL,
  `disenio_votado` int(11) NOT NULL,
  `tipo_disenio` int(11) NOT NULL,
  `instancia_voto` int(11) NOT NULL,
  `votacion_pertenece` int(11) NOT NULL,
  PRIMARY KEY (`voto`),
  KEY `id_usuario_voto` (`id_usuario_voto`),
  KEY `disenio_votado` (`disenio_votado`),
  KEY `tipo_disenio` (`tipo_disenio`),
  KEY `votacion_pertenece` (`votacion_pertenece`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `agenda_ibfk_4` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `agenda_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `agenda_ibfk_6` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `calificacion_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_4` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `calificacion_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_6` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_ibfk_4` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `comentario_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_ibfk_6` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `disenio`
--
ALTER TABLE `disenio`
  ADD CONSTRAINT `disenio_ibfk_1` FOREIGN KEY (`codigo_tipo`) REFERENCES `codigo_disenio` (`id_codigo_disenio`),
  ADD CONSTRAINT `disenio_ibfk_2` FOREIGN KEY (`votacion_pertenece`) REFERENCES `votacion` (`id_votacion`),
  ADD CONSTRAINT `disenio_ibfk_3` FOREIGN KEY (`id_votacion`) REFERENCES `votacion` (`id_votacion`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `fiesta`
--
ALTER TABLE `fiesta`
  ADD CONSTRAINT `fiesta_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `fiesta_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `imagen_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `info_viaje`
--
ALTER TABLE `info_viaje`
  ADD CONSTRAINT `info_viaje_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `info_viaje_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `mensajes_privado`
--
ALTER TABLE `mensajes_privado`
  ADD CONSTRAINT `mensajes_privado_ibfk_1` FOREIGN KEY (`id_emisor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `mensajes_privado_ibfk_2` FOREIGN KEY (`id_receptor`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `upd`
--
ALTER TABLE `upd`
  ADD CONSTRAINT `upd_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);


--
-- Filtros para la tabla `usuario_has_actividad`
--
ALTER TABLE `usuario_has_actividad`
  ADD CONSTRAINT `usuario_has_actividad_ibfk_1` FOREIGN KEY (`id_notificacion`) REFERENCES `notificaciones` (`id_notificacion`),
  ADD CONSTRAINT `usuario_has_actividad_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `usuario_has_actividad_ibfk_3` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `usuario_has_actividad_ibfk_4` FOREIGN KEY (`id_notificacion`) REFERENCES `notificaciones` (`id_notificacion`);

--
-- Filtros para la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD CONSTRAINT `votacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `votacion_ibfk_2` FOREIGN KEY (`usuario_apertura`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `votacion_ibfk_3` FOREIGN KEY (`curso_pertenece_votacion`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`id_usuario_voto`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `votos_ibfk_2` FOREIGN KEY (`disenio_votado`) REFERENCES `disenio` (`id_disenio`),
  ADD CONSTRAINT `votos_ibfk_3` FOREIGN KEY (`tipo_disenio`) REFERENCES `disenio` (`codigo_tipo`),
  ADD CONSTRAINT `votos_ibfk_4` FOREIGN KEY (`votacion_pertenece`) REFERENCES `votacion` (`id_votacion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

select * from disenio;
select * from usuario;

delete from disenio where id_disenio = 11;