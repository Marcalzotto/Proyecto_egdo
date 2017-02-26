-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2017 a las 01:50:19
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `egdo_db`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `x` ()  select * from curso$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `nombre_actividad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre_actividad`) VALUES
(1, 'Votacion'),
(2, 'UPD'),
(3, 'FiestaEgdo'),
(4, 'ViajeEgdo'),
(5, 'infoViaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_disenio`
--

CREATE TABLE `actividad_disenio` (
  `actividad_disenio_id` int(11) NOT NULL,
  `fecha_apertura` date DEFAULT NULL,
  `tipo_actividad` int(11) DEFAULT NULL,
  `usuario_apertura` int(11) NOT NULL,
  `curso_pertenece_votacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad_disenio`
--

INSERT INTO `actividad_disenio` (`actividad_disenio_id`, `fecha_apertura`, `tipo_actividad`, `usuario_apertura`, `curso_pertenece_votacion`) VALUES
(7, '2017-02-08', 0, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `valor_calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `id_usuario`, `id_empresa`, `valor_calificacion`) VALUES
(451, 6, 1, 4),
(452, 7, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_fiesta`
--

CREATE TABLE `calificacion_fiesta` (
  `calificacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion_fiesta`
--

INSERT INTO `calificacion_fiesta` (`calificacion`, `id_usuario`, `valor`, `id_lugar`) VALUES
(1, 9, 3, 3),
(2, 6, 1, 3),
(3, 7, 2, 4),
(5, 7, 1, 3),
(6, 7, 2, 5),
(7, 6, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_upd`
--

CREATE TABLE `calificacion_upd` (
  `calificacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion_upd`
--

INSERT INTO `calificacion_upd` (`calificacion`, `id_usuario`, `valor`, `id_lugar`) VALUES
(1, 8, 3, 1),
(2, 8, 3, 2),
(3, 8, 3, 3),
(5, 6, 1, 2),
(6, 6, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_disenio`
--

CREATE TABLE `codigo_disenio` (
  `id_codigo_disenio` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `codigo_disenio`
--

INSERT INTO `codigo_disenio` (`id_codigo_disenio`, `descripcion`) VALUES
(1, 'Buzo/Campera'),
(2, 'Remera'),
(3, 'Bandera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_empresas`
--

CREATE TABLE `comentario_empresas` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(2000) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario_empresas`
--

INSERT INTO `comentario_empresas` (`id_comentario`, `comentario`, `id_empresa`, `id_usuario`, `fecha`, `estado_moderar`) VALUES
(14, 'ELIMINADO.TITULOFUERALUGAR.', 1, 6, '2016-12-15 19:09:00', 1),
(15, 'Hola esta empresa es fantÃ¡stica, los mejor del aÃ±o script/script', 1, 6, '2016-12-15 19:09:00', 0),
(16, 'pero sera posible!!!!', 1, 7, '2017-02-10 21:06:00', 0),
(17, 'aaa', 1, 6, '2017-02-19 21:31:00', 0),
(18, 'holaaaaaaaaaaaaaaaaaaaaaa holaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaaholaaaaaaaaaaaaaaaaaaaaaa', 1, 6, '2017-02-19 21:31:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_fiesta`
--

CREATE TABLE `comentario_fiesta` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0',
  `id_lugar` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario_fiesta`
--

INSERT INTO `comentario_fiesta` (`id_comentario`, `comentario`, `fecha_hora`, `id_usuario`, `estado_moderar`, `id_lugar`, `id_curso`) VALUES
(2, 'hola soy ang!', '2017-02-25 00:47:17', 7, 1, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_infoviaje`
--

CREATE TABLE `comentario_infoviaje` (
  `id_comment` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `id_info_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_upd`
--

CREATE TABLE `comentario_upd` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0',
  `id_lugar` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario_upd`
--

INSERT INTO `comentario_upd` (`id_comentario`, `comentario`, `fecha_hora`, `id_usuario`, `estado_moderar`, `id_lugar`, `id_curso`) VALUES
(8, 'german german!!!!', '2017-02-25 00:43:08', 7, 1, 1, 2),
(9, 'a ver, que dificil que es esto por favor, no puede ser que este comentario responsive me haya costado tanto, por favor!!!!!!!!!!!!', '2017-02-25 03:46:10', 6, 1, 1, 2),
(10, 'Hola como estan, este lugar no esta tan bueno!', '2017-02-25 20:58:59', 6, 1, 1, 2),
(12, 'No puede ser', '2017-02-25 21:23:27', 6, 1, 1, 2),
(13, 'German es un gordo porco!!', '2017-02-25 21:30:26', 6, 1, 1, 2),
(14, 'German es un gordo porco22222!!', '2017-02-25 21:30:45', 6, 1, 1, 2),
(15, 'german il chancho porca miseria!!', '2017-02-25 21:31:16', 6, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre_empresa` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mensaje` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre_empresa`, `email`, `mensaje`) VALUES
(1, 'german', 'marcos.scalzotto24@gmail.com', 'holaaaaaaaaaaaaaaaaaaaa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_escuela` varchar(45) DEFAULT NULL,
  `localidad` varchar(70) DEFAULT NULL,
  `curso_anio` int(3) DEFAULT NULL,
  `curso_letra` varchar(3) DEFAULT NULL,
  `cant_alumnos` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_escuela`, `localidad`, `curso_anio`, `curso_letra`, `cant_alumnos`, `fecha_creacion`) VALUES
(2, 'UNLAM', 'San Justo', 3, 'D', 4, '2016-07-15 02:33:11'),
(3, 'EET Nro 7', 'Isiro Casanova', 5, 'F', 3, '2016-07-15 02:45:09'),
(4, 'gerrr', 'agagaagag', 1, 'D', 2, '2017-02-10 19:51:46'),
(5, 'INSTITUTO SAN MARTIN', 'VIRREY DEL PINO', 1, '1', 20, '2017-02-15 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_pdf`
--

CREATE TABLE `curso_pdf` (
  `id_arch` int(11) NOT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso_pdf`
--

INSERT INTO `curso_pdf` (`id_arch`, `pdf`, `curso`) VALUES
(22, 'pedidosCurso252661.pdf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disenio`
--

CREATE TABLE `disenio` (
  `id_disenio` int(11) NOT NULL,
  `codigo_tipo` int(11) NOT NULL,
  `id_usuario_subio` int(11) NOT NULL,
  `cantidad_votos` int(11) NOT NULL,
  `votos_segunda_instancia` int(11) NOT NULL,
  `path_frontal` varchar(100) NOT NULL,
  `path_espalda` varchar(100) NOT NULL,
  `path_img_doble` varchar(100) NOT NULL,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0',
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `disenio`
--

INSERT INTO `disenio` (`id_disenio`, `codigo_tipo`, `id_usuario_subio`, `cantidad_votos`, `votos_segunda_instancia`, `path_frontal`, `path_espalda`, `path_img_doble`, `estado_moderar`, `fecha_creacion`) VALUES
(7, 2, 6, 4, 3, 'images/userDesigns/frontalRemera571902.jpg', 'images/userDesigns/espaldaRemera571902.jpg', 'images/userDesigns/total571902.jpg', 0, '2017-02-14 18:52:04'),
(10, 1, 7, 2, 1, 'images/userDesigns/frontalBuzo305484.jpg', 'images/userDesigns/espaldaBuzo305484.jpg', 'images/userDesigns/total305484.jpg', 0, '2017-02-14 18:52:04'),
(11, 2, 8, 5, 2, 'images/userDesigns/frontalRemera721986.jpg', 'images/userDesigns/espaldaRemera721986.jpg', 'images/userDesigns/total721986.jpg', 0, '2017-02-14 18:52:04'),
(13, 1, 9, 4, 3, 'images/userDesigns/frontalBuzo699861.jpg', 'images/userDesigns/espaldaBuzo699861.jpg', 'images/userDesigns/total699861.jpg', 0, '2017-02-14 18:52:04'),
(14, 2, 9, 3, 1, 'images/userDesigns/frontalRemera207859.jpg', 'images/userDesigns/espaldaRemera207859.jpg', 'images/userDesigns/total207859.jpg', 0, '2017-02-14 18:52:04'),
(15, 1, 10, 1, 0, 'images/userDesigns/frontalBuzo458316.jpg', 'images/userDesigns/espaldaBuzo458316.jpg', 'images/userDesigns/total458316.jpg', 0, '2017-02-14 18:52:04'),
(16, 2, 10, 1, 0, 'images/userDesigns/frontalRemera926606.jpg', 'images/userDesigns/espaldaRemera926606.jpg', 'images/userDesigns/total926606.jpg', 0, '2017-02-14 18:52:04'),
(20, 3, 8, 1, 0, 'images/userDesigns/frontalBandera976624.jpg', 'images/userDesigns/espaldaBandera976624.jpg', 'images/userDesigns/total976624.jpg', 0, '2017-02-14 18:52:04'),
(21, 3, 9, 1, 0, 'images/userDesigns/frontalBandera47459.jpg', 'images/userDesigns/espaldaBandera47459.jpg', 'images/userDesigns/total47459.jpg', 0, '2017-02-14 18:52:04'),
(22, 3, 10, 3, 1, 'images/userDesigns/frontalBandera127445.jpg', 'images/userDesigns/espaldaBandera127445.jpg', 'images/userDesigns/total127445.jpg', 0, '2017-02-14 18:52:04'),
(23, 3, 6, 5, 3, 'images/userDesigns/frontalBandera17857.jpg', 'images/userDesigns/espaldaBandera17857.jpg', 'images/userDesigns/total17857.jpg', 0, '2017-02-14 18:52:04'),
(24, 3, 7, 4, 2, 'images/userDesigns/frontalBandera807069.jpg', 'images/userDesigns/espaldaBandera807069.jpg', 'images/userDesigns/total807069.jpg', 0, '2017-02-14 18:52:04'),
(25, 1, 8, 5, 2, 'images/userDesigns/frontalBuzo823518.jpg', 'images/userDesigns/espaldaBuzo823518.jpg', 'images/userDesigns/total823518.jpg', 0, '2017-02-14 18:52:04'),
(26, 2, 7, 1, 0, 'images/userDesigns/frontalRemera528506.jpg', 'images/userDesigns/espaldaRemera528506.jpg', 'images/userDesigns/total528506.jpg', 0, '2017-02-14 18:52:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pagina_web` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `cuit` varchar(45) DEFAULT NULL,
  `logo` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `telefono`, `calle`, `email`, `pagina_web`, `facebook`, `twitter`, `instagram`, `fecha_alta`, `cuit`, `logo`) VALUES
(1, 'EGDO', '1159322512', 'ALBATEIRO', 'romy@egdo.com', 'http://www.facebook.com/egdo', 'http://www.egdossssss.com', 'http://twitter.com/egdo', 'http://intagram.com/egdo', '2016-07-16', '11-32636185-8', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `id_actividad`, `id_usuario`, `fecha_hora`, `id_curso`) VALUES
(1, 3, 6, '2017-02-01 21:55:00', 2),
(2, 2, 6, '2017-02-01 16:50:55', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiesta`
--

CREATE TABLE `fiesta` (
  `id_fiesta` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `pagina_web` varchar(100) DEFAULT NULL,
  `detalles_adicionales` varchar(250) NOT NULL,
  `foto_perfil` varchar(200) NOT NULL,
  `foto_lugar` varchar(200) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario_propuesta` int(11) NOT NULL,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0',
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `calle` varchar(100) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  `calificacion` decimal(2,1) NOT NULL DEFAULT '0.0',
  `estado_moderar1` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fiesta`
--

INSERT INTO `fiesta` (`id_fiesta`, `nombre`, `telefono`, `facebook`, `twitter`, `instagram`, `pagina_web`, `detalles_adicionales`, `foto_perfil`, `foto_lugar`, `id_actividad`, `id_usuario_propuesta`, `estado_moderar`, `fecha_creacion`, `calle`, `altura`, `id_curso`, `calificacion`, `estado_moderar1`) VALUES
(3, 'german', '1133334455', 'facebook.com&#x2F;marquel', '', '', '', 'german german ang ang ang, tengo sueÃ±o y aun no esta todo listo.', 'lugares_fiesta/8IMG-20160124-WA0016.jpg', 'lugares_fiesta/20IMG-20160124-WA0020.jpg', 3, 6, 0, '2017-02-18 02:28:10', 'Av. siempre viva', 1500, 2, '1.7', 0),
(4, 'Salon de la fama', '1592832211', 'facebook.com&#x2F;hallOfFame', 'twitter.com&#x2F;hallOfFame', '', '', 'Este es el salon de la fama de EE.UU', 'lugares_fiesta/1hall_of_fame.png', 'lugares_fiesta/18hall-of-fame-hollywood.jpg', 3, 7, 0, '2017-02-24 02:40:02', 'Hall of Fame', 1988, 2, '2.0', 0),
(5, 'El cedron ', '1599022211', 'facebook.com&#x2F;elcedron', '', '', '', 'Esta es una pizzeria de mi barrio.', 'lugares_fiesta/4el_cedron.png', 'lugares_fiesta/6el_cedron2.jpg', 3, 8, 0, '2017-02-24 22:12:53', 'av directorio', 119888, 2, '3.5', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `nombre_imagen` varchar(45) DEFAULT NULL,
  `tamanio` decimal(6,2) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `ancho` int(11) DEFAULT NULL,
  `alto` int(11) DEFAULT NULL,
  `imagen` mediumblob,
  `portada` tinyint(1) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_viaje`
--

CREATE TABLE `info_viaje` (
  `id_info_viaje` int(11) NOT NULL,
  `nombre_lugar` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_viaje`
--

INSERT INTO `info_viaje` (`id_info_viaje`, `nombre_lugar`, `descripcion`, `id_actividad`, `id_usuario`, `imagen`) VALUES
(1, 'cancun', 'este es cancun', 5, 6, 'Cancun.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas_bandera`
--

CREATE TABLE `medidas_bandera` (
  `id_reg` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `medida` varchar(255) NOT NULL,
  `num_disenio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medidas_bandera`
--

INSERT INTO `medidas_bandera` (`id_reg`, `curso`, `medida`, `num_disenio`) VALUES
(1, 2, 'estandar', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_privado`
--

CREATE TABLE `mensajes_privado` (
  `id_mensaje` int(11) NOT NULL,
  `id_emisor` int(11) NOT NULL,
  `id_receptor` int(11) NOT NULL,
  `asunto` varchar(45) NOT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `leido` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `resumen` varchar(200) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `icono` varchar(200) NOT NULL,
  `curso_notificacion` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `tipo_notificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `resumen`, `link`, `icono`, `curso_notificacion`, `fecha_hora`, `tipo_notificacion`) VALUES
(23, 'Bienvenido a Egdo.', '#', '../images/avatar_64.png', 2, '2017-02-06 20:42:03', 1),
(24, 'Hay lugares que podrÃ­an interesarte para tu viaje.', 'infoviaje', '../images/bus.png', 2, '2017-02-06 20:42:03', 2),
(25, 'La etapa de disenio ha iniciado.', 'Tee-Designer-master/index', '../images/shirt.png', 2, '2017-02-06 20:42:03', 3),
(26, 'La etapa de votacion ha iniciado.', 'votacion', '../images/shirt.png', 2, '2017-02-06 20:54:17', 4),
(27, 'La votacion termino, mira los disenios ganadores.', 'votacion', '../images/shirt.png', 2, '2017-02-06 21:01:24', 5),
(28, 'Ya puedes elegir tus talles de ropa.', 'votacion', '../images/shirt.png', 2, '2017-02-06 21:01:24', 6),
(29, 'Ya puedes elegir la empresa que confeccione tus disenios.', 'empresas', '../images/empresas.png', 2, '2017-02-06 21:01:24', 7),
(30, 'Ya puedes empezar a proponer tu lugar para la fiesta de egresados.', 'fiesta', '../images/fiesta_egdo.png', 2, '2017-02-15 19:31:59', 12),
(33, 'Ya puedes empezar a proponer tu lugar para el UPD.', 'upd', '../images/upd.png', 2, '2017-02-15 20:36:46', 8),
(34, 'Ya propusiste lugar para el UPD? Sino lo hiciste hacelo quedan 5 dias o menos.', 'upd', '../images/upd.png', 2, '2017-02-15 20:52:41', 9),
(40, 'Ya propusiste lugar para la fiesta? Sino lo hiciste hacelo quedan 5 dias o menos.', 'fiesta', '../images/fiesta_egdo.png', 2, '2017-02-15 22:50:41', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_vista_por`
--

CREATE TABLE `notificacion_vista_por` (
  `id_reg` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `id_notificacion` int(11) NOT NULL,
  `borrada` tinyint(1) DEFAULT NULL,
  `curso_notificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion_vista_por`
--

INSERT INTO `notificacion_vista_por` (`id_reg`, `usuario`, `id_notificacion`, `borrada`, `curso_notificacion`) VALUES
(78, 6, 29, 1, 2),
(83, 7, 23, 1, 2),
(86, 7, 26, 1, 2),
(87, 7, 27, 1, 2),
(88, 7, 28, 1, 2),
(89, 7, 29, 1, 2),
(91, 6, 26, 1, 2),
(92, 6, 27, 1, 2),
(94, 6, 23, 1, 2),
(95, 6, 25, 1, 2),
(96, 6, 28, 1, 2),
(98, 7, 25, 1, 2),
(99, 6, 24, 1, 2),
(108, 7, 24, 0, 2),
(111, 7, 33, 0, 2),
(113, 6, 33, 1, 2),
(114, 6, 34, 1, 2),
(123, 7, 34, 0, 2),
(125, 6, 40, 1, 2),
(126, 7, 40, 1, 2),
(128, 6, 30, 0, 2),
(130, 7, 30, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL DEFAULT '0',
  `descripcion_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion_rol`) VALUES
(1, 'Administrador EGDO'),
(2, 'Administrador Curso'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talles_curso`
--

CREATE TABLE `talles_curso` (
  `item` int(11) NOT NULL,
  `talle_buzo` varchar(3) DEFAULT NULL,
  `talle_remera` varchar(3) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talles_curso`
--

INSERT INTO `talles_curso` (`item`, `talle_buzo`, `talle_remera`, `usuario`, `curso`) VALUES
(4, 'xs', 'm', 6, 2),
(5, 's', 'N/D', 7, 2),
(6, 'N/D', 'm', 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcalendario`
--

CREATE TABLE `tcalendario` (
  `id` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `evento` text NOT NULL,
  `icono` varchar(200) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `barrio` varchar(75) DEFAULT NULL,
  `calle` varchar(50) NOT NULL,
  `altura` decimal(11,0) DEFAULT NULL,
  `curso_eventos` int(11) DEFAULT NULL,
  `tipo_evento` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tcalendario`
--

INSERT INTO `tcalendario` (`id`, `fecha`, `evento`, `icono`, `hora`, `barrio`, `calle`, `altura`, `curso_eventos`, `tipo_evento`) VALUES
(1, '2017-02-24', 'Pagar cuota 1: $1500', '../images/evento_icons/upd.png', '03:59:00', 'Villa de parque', 'Av. siempre viva', '1234', 2, 'Pagos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_notificaciones`
--

CREATE TABLE `tipo_notificaciones` (
  `id_notificaciones` int(11) NOT NULL,
  `resumen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_notificaciones`
--

INSERT INTO `tipo_notificaciones` (`id_notificaciones`, `resumen`) VALUES
(1, 'NOTIFICACIONES DE BIENVENIDA'),
(2, 'NOTIFICACIONES DE LUGARES TURISTICOS'),
(3, 'APERTURA ETAPA 1 DISENIO'),
(4, 'APERTURA ETAPA 2 DISENIO'),
(5, 'NOTIFICACION DISENIOS GANADORES'),
(6, 'APERTURA DE ETAPA 3 DISENIO'),
(7, 'APERTURA DE ETAPA 4 DISENIO'),
(8, 'NOTIFICACION INICIO DE PROPUESTA DE LUGARES UPD'),
(9, 'NOTIFICACION AVISO DE FINALIZACION DE PROPUESTA DE LUGARES UPD'),
(10, 'NOTIFICACIONES INICIO DE CALIFICACION DE LUGARES UPD'),
(11, 'NOTIFICACIONES DE LUGAR GANADOR UPD'),
(12, 'NOTIFICACION INICIO DE PROPUESTA DE LUGARES FIESTA DE EGRESADOS'),
(13, 'NOTIFICACION AVISO DE FINALIZACION DE PROPUESTA DE LUGARES FIESTA DE EGRESADOS'),
(14, 'NOTIFICACIONES INICIO DE CALIFICACION DE LUGARES FIESTA DE EGRESADOS'),
(15, 'NOTIFICACIONES LUGAR GANADOR FIESTA DE EGRESADOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upd`
--

CREATE TABLE `upd` (
  `id_upd` int(11) NOT NULL,
  `nombre_lugar` varchar(45) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `pagina_web` varchar(100) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `detalles_adicionales` varchar(250) NOT NULL,
  `foto_perfil` varchar(200) DEFAULT NULL,
  `foto_lugar` varchar(200) DEFAULT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario_propuesta` int(11) NOT NULL,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0',
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `calle` varchar(100) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  `calificacion` decimal(2,1) NOT NULL DEFAULT '0.0',
  `estado_moderar1` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `upd`
--

INSERT INTO `upd` (`id_upd`, `nombre_lugar`, `telefono`, `pagina_web`, `facebook`, `twitter`, `instagram`, `detalles_adicionales`, `foto_perfil`, `foto_lugar`, `id_actividad`, `id_usuario_propuesta`, `estado_moderar`, `fecha_creacion`, `calle`, `altura`, `id_curso`, `calificacion`, `estado_moderar1`) VALUES
(1, 'Parrilla san roque', '1133334455', '', '', '', 'instagram.com&#x2F;parrilla_sanroque', 'Buena parrigrasa.', 'lugares_upd/9IMG-20160124-WA0024.jpg', 'lugares_upd/0IMG-20160124-WA0011.jpg', 2, 6, 0, '2017-02-24 23:30:29', 'Av. siempre viva', 1234, 2, '3.0', 0),
(2, 'Salon acuaman', '15111111', '', 'facebook.com&#x2F;acuamandeinodoro', 'twitter.com&#x2F;acuaman', '', 'Salon acuaman, imperdible!!!!', 'lugares_upd/2acuaman.png', 'lugares_upd/19descarga_acuaman.jpg', 2, 7, 0, '2017-02-24 23:35:28', 'acuaman', 11334, 2, '2.0', 0),
(3, 'pelotero centro', '1133334455', 'http:&#x2F;&#x2F;peloteronemo.com', 'facebook.com&#x2F;pelotero_capital', '', '', 'Pelotero con un nemo gigante, imperdible.', 'lugares_upd/11pelotero_nemo.jpg', 'lugares_upd/2pelotero_dori.jpg', 2, 8, 0, '2017-02-24 23:38:16', 'Alli Cerquita', 55662, 2, '2.0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(256) DEFAULT NULL,
  `fechaAltaUsuario` datetime NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_confirmacion` varchar(100) NOT NULL,
  `estadoActivacion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `contrasenia`, `fechaAltaUsuario`, `id_rol`, `id_curso`, `id_confirmacion`, `estadoActivacion`) VALUES
(1, 'NOELIA', 'MOREL', 'noe@egdo.com', '$2y$10$2xooZFK2pLKzLs0SXj1xb.ClC1CxIWmVJjt9SAEEFtzwGOxaoqN0m', '0000-00-00 00:00:00', 1, 2, '0', 1),
(2, 'Romina', 'Velasco', 'romy@egdo.com', '$2y$10$fe4F.UXndVqbKzpTtcuAn.sTEM8NtoXOyQ80Zsjw2kkdpjZPLhSku', '0000-00-00 00:00:00', 1, NULL, '0', 0),
(3, 'Marcos', 'Scalzotto', 'marcos@egdo.com', '$2y$10$mrw6qL8YQ1HJQB558IotxeygRWYXSyeH38yzr.TciwLKHkui/246e', '0000-00-00 00:00:00', 1, NULL, '0', 0),
(4, 'Paula', 'Neri', 'pau@egdo.com', '$2y$10$2WM7X14LYBGQrO.PdNb52OEsybRcR/5fSK48acVUaN92XLXDVMzUe', '0000-00-00 00:00:00', 1, NULL, '0', 0),
(6, 'NOELIA', 'MOREL', 'noe@gmail.com', '$2y$10$oq6gXZBLb9o5ff0r5vwfY.AeJyAbwaiu1hEEGSVPxA/P/YAfSr/Vy', '2016-07-15 02:25:13', 2, 2, '578873b9d99ba', 1),
(7, 'Noe', 'Rodriguez', 'noe@live.com', '$2y$10$tpVP.6mbpIb.PRge/LsisOQs1vgRSRvzBEAKjDyU9FPIwEFCOgOMi', '2016-07-15 02:34:10', 3, 2, '578875d207524', 1),
(8, 'Jose', NULL, 'jose@egdo.com', '$2y$10$7/jeZbGKcI1b/UPvN7AY4e3ZFdV016vXLCtcof8oQ2eWqHlJ4Q4U.', '2016-07-15 02:34:10', 3, 2, '578875d535ff2', 0),
(9, 'Luis', NULL, 'luis@egdo.com', '$2y$10$7/jeZbGKcI1b/UPvN7AY4e3ZFdV016vXLCtcof8oQ2eWqHlJ4Q4U.', '2016-07-15 02:34:10', 3, 2, '578875d8c3a5f', 0),
(10, 'Maria', NULL, 'maria@egdo.com', '$2y$10$7/jeZbGKcI1b/UPvN7AY4e3ZFdV016vXLCtcof8oQ2eWqHlJ4Q4U.', '2016-07-15 02:34:10', 3, 2, '578875dc1d6f5', 0),
(11, 'MATIAS', 'PEREZ', 'noenmorel@gmail.com', '$2y$10$oq6gXZBLb9o5ff0r5vwfY.AeJyAbwaiu1hEEGSVPxA/P/YAfSr/Vy', '2016-07-15 02:39:43', 2, 3, '5788771f23a79', 1),
(12, 'Mario', 'Diaz', 'noeliamorel@live.com', '$2y$10$QhjrM9pt8xINB25ejC9KDeTxna6M2jMi/9St/ngM9yCEUgJgvwjcG', '2016-07-15 02:46:20', 3, 3, '578878ac88e84', 1),
(13, NULL, NULL, 'liliana@egdo.com', NULL, '2016-07-15 02:46:20', 3, 3, '578878afcb1d7', 0),
(14, NULL, NULL, 'daniel@egdo.com', NULL, '2016-07-15 02:46:20', 3, 3, '578878b2dfaa7', 0),
(16, NULL, NULL, 'marcos.scalzotto@gmail.com', NULL, '2017-01-30 19:54:08', 3, 2, '588fc410b75e2', 0),
(17, NULL, NULL, 'marcos.scalzotto@gmail.com', NULL, '2017-01-30 19:54:16', 3, 2, '588fc418dbdbc', 0),
(18, NULL, NULL, 'marcos.scalzotto@gmail.com', NULL, '2017-01-30 19:54:27', 3, 2, '588fc423ef4cd', 0),
(19, 'marcos', 'sczlz', 'marcos.scalzotto@hotmail.com', '$2y$10$4i8XY62Y74Vi9QacgYz2iuQ/F9gQ4YfXLrGW1i68pfFoSshFPx40K', '2017-02-10 19:29:13', 2, NULL, '589e3eb94384b', 0),
(20, 'marcos', 'klklkllkk', 'marcos.scalzotto24@gmail.com', '$2y$10$w35pgoEmpqsRRSuz.P25KefYOaDnN03oRvjhdCFSWzXcsqbPW2fFe', '2017-02-10 19:35:17', 2, 4, '589e4025e6535', 1),
(21, NULL, NULL, 'noenmorel@gmail.com', NULL, '2017-02-10 19:53:00', 3, 4, '589e444c196e5', 0),
(22, NULL, NULL, 'pauuu.10.03@gmail.com', NULL, '2017-02-10 19:53:00', 3, 4, '589e4455703b4', 0),
(23, NULL, NULL, 'marcos.scalzotto@gmail.com', '$2y$10$oq6gXZBLb9o5ff0r5vwfY.AeJyAbwaiu1hEEGSVPxA/P/YAfSr/Vy', '2017-02-10 21:14:01', 3, 2, '589e5749920d2', 0),
(24, NULL, NULL, 'noenmorel@gmail.com', NULL, '2017-02-10 21:14:01', 3, 2, '589e574b2c445', 0),
(26, 'mark', 'scalz', 'rosse_velasco28@hotmail.com', '$2y$10$5O.g5D5rmK6iDht7R9CshODwn2n4/dfsg8peW0.6iga6hOGXrxQbi', '2017-02-14 20:40:53', 2, NULL, '58a39585e09a6', 0),
(27, NULL, NULL, 'marcos.scalzotto@gmail.com', NULL, '2017-02-25 16:27:43', 3, 2, '58b1daaf4bf96', 0),
(28, NULL, NULL, 'marcos.scalzotto@gmail.com', NULL, '2017-02-25 16:30:53', 3, 2, '58b1db6d37ebc', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `voto` int(11) NOT NULL,
  `id_usuario_voto` int(11) NOT NULL,
  `disenio_votado` int(11) NOT NULL,
  `tipo_disenio` int(11) NOT NULL,
  `instancia_voto` int(11) NOT NULL,
  `actividad_disenio_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`voto`, `id_usuario_voto`, `disenio_votado`, `tipo_disenio`, `instancia_voto`, `actividad_disenio_num`) VALUES
(75, 6, 10, 1, 1, 7),
(76, 6, 13, 1, 1, 7),
(77, 6, 25, 1, 1, 7),
(78, 7, 13, 1, 1, 7),
(79, 7, 10, 1, 1, 7),
(80, 7, 15, 1, 1, 7),
(81, 7, 25, 1, 1, 7),
(82, 8, 13, 1, 1, 7),
(83, 8, 25, 1, 1, 7),
(84, 9, 25, 1, 1, 7),
(85, 10, 13, 1, 1, 7),
(86, 10, 25, 1, 1, 7),
(87, 6, 7, 2, 1, 7),
(88, 6, 14, 2, 1, 7),
(89, 6, 11, 2, 1, 7),
(90, 7, 11, 2, 1, 7),
(91, 7, 7, 2, 1, 7),
(92, 7, 16, 2, 1, 7),
(93, 7, 14, 2, 1, 7),
(94, 8, 7, 2, 1, 7),
(95, 8, 11, 2, 1, 7),
(96, 9, 11, 2, 1, 7),
(97, 10, 7, 2, 1, 7),
(98, 10, 11, 2, 1, 7),
(99, 10, 14, 2, 1, 7),
(100, 6, 22, 3, 1, 7),
(101, 6, 23, 3, 1, 7),
(102, 6, 24, 3, 1, 7),
(103, 7, 20, 3, 1, 7),
(104, 7, 21, 3, 1, 7),
(105, 7, 22, 3, 1, 7),
(106, 7, 23, 3, 1, 7),
(107, 7, 24, 3, 1, 7),
(108, 8, 23, 3, 1, 7),
(109, 8, 24, 3, 1, 7),
(110, 9, 23, 3, 1, 7),
(111, 10, 22, 3, 1, 7),
(112, 10, 23, 3, 1, 7),
(113, 10, 24, 3, 1, 7),
(114, 6, 25, 1, 2, 7),
(115, 7, 25, 1, 2, 7),
(116, 8, 13, 1, 2, 7),
(117, 9, 13, 1, 2, 7),
(118, 10, 10, 1, 2, 7),
(119, 6, 11, 2, 2, 7),
(120, 7, 11, 2, 2, 7),
(121, 8, 7, 2, 2, 7),
(122, 9, 7, 2, 2, 7),
(123, 10, 14, 2, 2, 7),
(124, 6, 23, 3, 2, 7),
(125, 7, 23, 3, 2, 7),
(126, 8, 24, 3, 2, 7),
(127, 9, 24, 3, 2, 7),
(128, 10, 22, 3, 2, 7),
(129, 6, 13, 1, 2, 7),
(130, 6, 7, 2, 2, 7),
(131, 6, 23, 3, 2, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `actividad_disenio`
--
ALTER TABLE `actividad_disenio`
  ADD PRIMARY KEY (`actividad_disenio_id`),
  ADD KEY `usuario_apertura` (`usuario_apertura`),
  ADD KEY `curso_pertenece_votacion` (`curso_pertenece_votacion`),
  ADD KEY `usuario_apertura_2` (`usuario_apertura`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `calificacion_fiesta`
--
ALTER TABLE `calificacion_fiesta`
  ADD PRIMARY KEY (`calificacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `cf_fk_fiesta` (`id_lugar`);

--
-- Indices de la tabla `calificacion_upd`
--
ALTER TABLE `calificacion_upd`
  ADD PRIMARY KEY (`calificacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_lugar` (`id_lugar`);

--
-- Indices de la tabla `codigo_disenio`
--
ALTER TABLE `codigo_disenio`
  ADD PRIMARY KEY (`id_codigo_disenio`);

--
-- Indices de la tabla `comentario_empresas`
--
ALTER TABLE `comentario_empresas`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `comentario_empresas_ibfk_2` (`id_usuario`),
  ADD KEY `comentario_empresas_ibfk_1` (`id_empresa`);

--
-- Indices de la tabla `comentario_fiesta`
--
ALTER TABLE `comentario_fiesta`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `comentario_fiesta_ibfk_2` (`id_lugar`);

--
-- Indices de la tabla `comentario_infoviaje`
--
ALTER TABLE `comentario_infoviaje`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_info_viaje` (`id_info_viaje`);

--
-- Indices de la tabla `comentario_upd`
--
ALTER TABLE `comentario_upd`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `comentario_upd_ibfk_2` (`id_lugar`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `curso_pdf`
--
ALTER TABLE `curso_pdf`
  ADD PRIMARY KEY (`id_arch`),
  ADD KEY `curso_pdf_ibfk_1` (`curso`);

--
-- Indices de la tabla `disenio`
--
ALTER TABLE `disenio`
  ADD PRIMARY KEY (`id_disenio`),
  ADD KEY `codigo_tipo` (`codigo_tipo`),
  ADD KEY `id_usuario_subio` (`id_usuario_subio`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `evento_ibfk_4` (`id_curso`);

--
-- Indices de la tabla `fiesta`
--
ALTER TABLE `fiesta`
  ADD PRIMARY KEY (`id_fiesta`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_usuario_propuesta` (`id_usuario_propuesta`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `info_viaje`
--
ALTER TABLE `info_viaje`
  ADD PRIMARY KEY (`id_info_viaje`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `info_viaje_ibfk_3` (`id_usuario`);

--
-- Indices de la tabla `medidas_bandera`
--
ALTER TABLE `medidas_bandera`
  ADD PRIMARY KEY (`id_reg`),
  ADD KEY `num_disenio` (`num_disenio`),
  ADD KEY `medidas_bandera_ibfk_1` (`curso`);

--
-- Indices de la tabla `mensajes_privado`
--
ALTER TABLE `mensajes_privado`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_emisor` (`id_emisor`),
  ADD KEY `id_receptor` (`id_receptor`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `tipo_notificacion` (`tipo_notificacion`),
  ADD KEY `notificaciones_ibfk_1` (`curso_notificacion`);

--
-- Indices de la tabla `notificacion_vista_por`
--
ALTER TABLE `notificacion_vista_por`
  ADD PRIMARY KEY (`id_reg`),
  ADD KEY `id_notificacion` (`id_notificacion`),
  ADD KEY `notificacion_vista_por_ibfk_1` (`usuario`),
  ADD KEY `notificacion_vista_por_ibfk_3` (`curso_notificacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `talles_curso`
--
ALTER TABLE `talles_curso`
  ADD PRIMARY KEY (`item`),
  ADD KEY `talles_curso_ibfk_2` (`usuario`),
  ADD KEY `talles_curso_ibfk_3` (`curso`);

--
-- Indices de la tabla `tcalendario`
--
ALTER TABLE `tcalendario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_eventos` (`curso_eventos`);

--
-- Indices de la tabla `tipo_notificaciones`
--
ALTER TABLE `tipo_notificaciones`
  ADD PRIMARY KEY (`id_notificaciones`);

--
-- Indices de la tabla `upd`
--
ALTER TABLE `upd`
  ADD PRIMARY KEY (`id_upd`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_usuario_propuesta` (`id_usuario_propuesta`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`voto`),
  ADD KEY `id_usuario_voto` (`id_usuario_voto`),
  ADD KEY `disenio_votado` (`disenio_votado`),
  ADD KEY `tipo_disenio` (`tipo_disenio`),
  ADD KEY `votacion_pertenece` (`actividad_disenio_num`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `actividad_disenio`
--
ALTER TABLE `actividad_disenio`
  MODIFY `actividad_disenio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453;
--
-- AUTO_INCREMENT de la tabla `calificacion_fiesta`
--
ALTER TABLE `calificacion_fiesta`
  MODIFY `calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `calificacion_upd`
--
ALTER TABLE `calificacion_upd`
  MODIFY `calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `codigo_disenio`
--
ALTER TABLE `codigo_disenio`
  MODIFY `id_codigo_disenio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `comentario_empresas`
--
ALTER TABLE `comentario_empresas`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `comentario_fiesta`
--
ALTER TABLE `comentario_fiesta`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentario_infoviaje`
--
ALTER TABLE `comentario_infoviaje`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario_upd`
--
ALTER TABLE `comentario_upd`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `curso_pdf`
--
ALTER TABLE `curso_pdf`
  MODIFY `id_arch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `disenio`
--
ALTER TABLE `disenio`
  MODIFY `id_disenio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `fiesta`
--
ALTER TABLE `fiesta`
  MODIFY `id_fiesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `info_viaje`
--
ALTER TABLE `info_viaje`
  MODIFY `id_info_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `medidas_bandera`
--
ALTER TABLE `medidas_bandera`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mensajes_privado`
--
ALTER TABLE `mensajes_privado`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `notificacion_vista_por`
--
ALTER TABLE `notificacion_vista_por`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT de la tabla `talles_curso`
--
ALTER TABLE `talles_curso`
  MODIFY `item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tcalendario`
--
ALTER TABLE `tcalendario`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `upd`
--
ALTER TABLE `upd`
  MODIFY `id_upd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `voto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_disenio`
--
ALTER TABLE `actividad_disenio`
  ADD CONSTRAINT `actividad_disenio_ibfk_1` FOREIGN KEY (`usuario_apertura`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `actividad_disenio_ibfk_2` FOREIGN KEY (`curso_pertenece_votacion`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_disenio_ibfk_3` FOREIGN KEY (`usuario_apertura`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacion_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_4` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `calificacion_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_6` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `calificacion_fiesta`
--
ALTER TABLE `calificacion_fiesta`
  ADD CONSTRAINT `calificacion_fiesta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `cf_fk_fiesta` FOREIGN KEY (`id_lugar`) REFERENCES `fiesta` (`id_fiesta`);

--
-- Filtros para la tabla `calificacion_upd`
--
ALTER TABLE `calificacion_upd`
  ADD CONSTRAINT `calificacion_upd_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_upd_ibfk_2` FOREIGN KEY (`id_lugar`) REFERENCES `upd` (`id_upd`);

--
-- Filtros para la tabla `comentario_empresas`
--
ALTER TABLE `comentario_empresas`
  ADD CONSTRAINT `comentario_empresas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_empresas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario_fiesta`
--
ALTER TABLE `comentario_fiesta`
  ADD CONSTRAINT `comentario_fiesta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_fiesta_ibfk_2` FOREIGN KEY (`id_lugar`) REFERENCES `fiesta` (`id_fiesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_fiesta_ibfk_3` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario_infoviaje`
--
ALTER TABLE `comentario_infoviaje`
  ADD CONSTRAINT `comentario_infoviaje_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_infoviaje_ibfk_2` FOREIGN KEY (`id_info_viaje`) REFERENCES `info_viaje` (`id_info_viaje`);

--
-- Filtros para la tabla `comentario_upd`
--
ALTER TABLE `comentario_upd`
  ADD CONSTRAINT `comentario_upd_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_upd_ibfk_2` FOREIGN KEY (`id_lugar`) REFERENCES `upd` (`id_upd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_upd_ibfk_3` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso_pdf`
--
ALTER TABLE `curso_pdf`
  ADD CONSTRAINT `curso_pdf_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `disenio`
--
ALTER TABLE `disenio`
  ADD CONSTRAINT `disenio_ibfk_1` FOREIGN KEY (`id_usuario_subio`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disenio_ibfk_2` FOREIGN KEY (`codigo_tipo`) REFERENCES `codigo_disenio` (`id_codigo_disenio`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `evento_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fiesta`
--
ALTER TABLE `fiesta`
  ADD CONSTRAINT `fiesta_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `fiesta_ibfk_3` FOREIGN KEY (`id_usuario_propuesta`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fiesta_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `imagen_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imagen_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `info_viaje`
--
ALTER TABLE `info_viaje`
  ADD CONSTRAINT `info_viaje_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `info_viaje_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medidas_bandera`
--
ALTER TABLE `medidas_bandera`
  ADD CONSTRAINT `medidas_bandera_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medidas_bandera_ibfk_2` FOREIGN KEY (`num_disenio`) REFERENCES `disenio` (`id_disenio`);

--
-- Filtros para la tabla `mensajes_privado`
--
ALTER TABLE `mensajes_privado`
  ADD CONSTRAINT `mensajes_privado_ibfk_1` FOREIGN KEY (`id_emisor`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajes_privado_ibfk_2` FOREIGN KEY (`id_receptor`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`curso_notificacion`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`tipo_notificacion`) REFERENCES `tipo_notificaciones` (`id_notificaciones`);

--
-- Filtros para la tabla `notificacion_vista_por`
--
ALTER TABLE `notificacion_vista_por`
  ADD CONSTRAINT `notificacion_vista_por_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificacion_vista_por_ibfk_2` FOREIGN KEY (`id_notificacion`) REFERENCES `notificaciones` (`id_notificacion`),
  ADD CONSTRAINT `notificacion_vista_por_ibfk_3` FOREIGN KEY (`curso_notificacion`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talles_curso`
--
ALTER TABLE `talles_curso`
  ADD CONSTRAINT `talles_curso_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `talles_curso_ibfk_3` FOREIGN KEY (`curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tcalendario`
--
ALTER TABLE `tcalendario`
  ADD CONSTRAINT `tcalendario_ibfk_1` FOREIGN KEY (`curso_eventos`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `upd`
--
ALTER TABLE `upd`
  ADD CONSTRAINT `upd_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`),
  ADD CONSTRAINT `upd_ibfk_2` FOREIGN KEY (`id_usuario_propuesta`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upd_ibfk_3` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`id_usuario_voto`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votos_ibfk_2` FOREIGN KEY (`disenio_votado`) REFERENCES `disenio` (`id_disenio`),
  ADD CONSTRAINT `votos_ibfk_3` FOREIGN KEY (`tipo_disenio`) REFERENCES `codigo_disenio` (`id_codigo_disenio`),
  ADD CONSTRAINT `votos_ibfk_4` FOREIGN KEY (`actividad_disenio_num`) REFERENCES `actividad_disenio` (`actividad_disenio_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


