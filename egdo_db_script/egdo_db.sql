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
  `id_actividad` int(11) NOT NULL,
  `nombre_actividad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nombre_evento` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `icono` tinyblob,
  `color` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_disenio`
--

CREATE TABLE `codigo_disenio` (
  `id_codigo_disenio` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL
   	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
CREATE TABLE contacto(
id_contacto INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
nombre_empresa VARCHAR(45) NOT NULL,
email VARCHAR(45) NOT NULL,
mensaje VARCHAR(250) NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_escuela` varchar(45) DEFAULT NULL,
  `localidad` varchar(70) DEFAULT NULL,
  `curso_anio` int(3) DEFAULT NULL,
  `curso_letra` varchar(3) DEFAULT NULL,
  `cant_alumnos` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disenio`
--

CREATE TABLE `disenio` (
  `id_disenio` int(11) NOT NULL,
  `id_codigo_disenio` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `disenio` mediumblob,
  `id_usuario` int(11) DEFAULT NULL,
  `id_votacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
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
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `imagen1` mediumblob,
  `imagen2` mediumblob,
  `id_actividad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiesta`
--

CREATE TABLE `fiesta` (
  `id_fiesta` int(11) NOT NULL,
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
  `id_usuario_propuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `nombre_lugar` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_privado`
--

CREATE TABLE `mensajes_privado` (
  `id_mensaje` int(11) NOT NULL,
  `asunto` varchar(45) DEFAULT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_emisor` int(11) DEFAULT NULL,
  `id_receptor` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `resumen` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL DEFAULT '0',
  `descripcion_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upd`
--

CREATE TABLE `upd` (
  `id_upd` int(11) NOT NULL,
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
  `id_usuario_propuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- Inserts tabla usuario
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
(11, 'MATIAS', 'PEREZ', 'noenmorel@gmail.com', '$2y$10$.u1a24LQki3Srdvb8PSHou7lixkocPMUFjUWUBXUyESOizOof6FLe', '2016-07-15 02:39:43', 2, 3, '5788771f23a79', 1),
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
(23, NULL, NULL, 'marcos.scalzotto@gmail.com', NULL, '2017-02-10 21:14:01', 3, 2, '589e5749920d2', 0),
(24, NULL, NULL, 'noenmorel@gmail.com', NULL, '2017-02-10 21:14:01', 3, 2, '589e574b2c445', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_actividad`
--

CREATE TABLE `usuario_has_actividad` (
  `id_notificacion` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE `votacion` (
  `id_votacion` int(11) NOT NULL,
  `fecha_apertura` datetime DEFAULT NULL,
  `estado_votacion` varchar(45) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE talles_curso(
	item int primary key not null auto_increment,	
	codigo_item int not null,
	talle varchar(3) not null,
	usuario int not null,
	curso int not null,
	foreign key (codigo_item) references codigo_disenio(id_codigo_disenio),
	foreign key (usuario) references usuario(id_usuario),
	foreign key (curso) references curso(id_curso)
);

CREATE TABLE medidas_bandera(
	id_reg int primary key not null auto_increment,
	curso int not null,
	medida varchar(255) not null,
	num_disenio int not null,
	foreign key (curso) references curso(id_curso),
	foreign key (num_disenio) references disenio(id_disenio)
);

CREATE TABLE curso_pdf(

id_arch int primary key not null auto_increment,
pdf mediumblob not null,
curso int not null,
foreign key (curso) references curso(id_curso)
);

CREATE TABLE comentario_empresas(
id_comentario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
comentario VARCHAR(2000) NOT NULL,
id_empresa INT NOT NULL,
id_usuario INT NOT NULL,
FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa),
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE IF NOT EXISTS `tcalendario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `evento` text NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `notificacion_vista_por`(
	id_reg INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	usuario INT NOT NULL,
	id_notificacion INT NOT NULL,
	borrada BOOL NULL,
	curso_notificacion INT NOT NULL
);

CREATE TABLE tipo_notificaciones(
id_notificaciones INT NOT NULL PRIMARY KEY,
resumen VARCHAR(200) NOT NULL
);
-- 	
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `codigo_disenio`
--
ALTER TABLE `codigo_disenio`
  ADD PRIMARY KEY (`id_codigo_disenio`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `disenio`
--
ALTER TABLE `disenio`
  ADD PRIMARY KEY (`id_disenio`),
  ADD KEY `id_codigo_disenio` (`id_codigo_disenio`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `fiesta`
--
ALTER TABLE `fiesta`
  ADD PRIMARY KEY (`id_fiesta`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `info_viaje`
--
ALTER TABLE `info_viaje`
  ADD PRIMARY KEY (`id_info_viaje`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `mensajes_privado`
--
ALTER TABLE `mensajes_privado`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD COLUMN icono VARCHAR(200) NOT NULL,
  ADD PRIMARY KEY (`id_notificacion`);

-- Indices para la tabla notificacion_vista_por

ALTER TABLE `notificacion_vista_por`
  ADD FOREIGN KEY (usuario) REFERENCES usuario(id_usuario),
  ADD FOREIGN KEY (id_notificacion) REFERENCES notificaciones(id_notificacion),
  ADD FOREIGN KEY (curso_notificacion) REFERENCES curso(id_curso); 
--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `upd`
--
ALTER TABLE `upd`
  ADD PRIMARY KEY (`id_upd`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `usuario_has_actividad`
--
ALTER TABLE `usuario_has_actividad`
  ADD PRIMARY KEY (`id_notificacion`,`id_actividad`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD PRIMARY KEY (`id_votacion`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `codigo_disenio`
--
ALTER TABLE `codigo_disenio`
  MODIFY `id_codigo_disenio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `disenio`
--
ALTER TABLE `disenio`
  MODIFY `id_disenio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fiesta`
--
ALTER TABLE `fiesta`
  MODIFY `id_fiesta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `info_viaje`
--
ALTER TABLE `info_viaje`
  MODIFY `id_info_viaje` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes_privado`
--
ALTER TABLE `mensajes_privado`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `upd`
--
ALTER TABLE `upd`
  MODIFY `id_upd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `votacion`
--
ALTER TABLE `votacion`
  MODIFY `id_votacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

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

-- Ultimos cambios realizados

ALTER TABLE votos DROP FOREIGN KEY votos_ibfk_4;
ALTER TABLE votos CHANGE COLUMN votacion_pertenece actividad_disenio_num int;

-- renombrar la tabla votacion por actividad_disenio  

ALTER TABLE votos ADD CONSTRAINT votos_ibfk_4 FOREIGN KEY(actividad_disenio_num) 
REFERENCES actividad_disenio(actividad_disenio_id);

ALTER TABLE actividad_disenio DROP COLUMN vigente;

ALTER TABLE calificacion add column valor_calificacion int not null;
ALTER TABLE actividad_disenio CHANGE COLUMN fecha_apertura fecha_apertura date;
ALTER TABLE comentario CHANGE COLUMN comentario comentario VARCHAR(1000);
ALTER TABLE comentario_empresas CHANGE COLUMN fecha fecha DATETIME NOT NULL;

-- MODIFICACIONES DE LA TABLA tcalendario
ALTER TABLE tcalendario ADD COLUMN color VARCHAR(7) NOT NULL;
ALTER TABLE tcalendario ADD COLUMN icono VARCHAR(200) NULL;
ALTER TABLE tcalendario ADD COLUMN hora TIME NOT NULL;
ALTER TABLE tcalendario ADD COLUMN barrio VARCHAR(75) NOT NULL;
ALTER TABLE tcalendario ADD COLUMN calle VARCHAR(50) NOT NULL;
ALTER TABLE tcalendario ADD COLUMN altura NUMERIC(11) NOT NULL;
ALTER TABLE tcalendario ADD COLUMN curso_eventos INT(11) NOT NULL;
ALTER TABLE tcalendario ADD CONSTRAINT curso_eventos_fk FOREIGN KEY(curso_eventos) references curso(id_curso);
-- Modificaciones de prueba
ALTER TABLE tcalendario CHANGE COLUMN color color VARCHAR(7) NULL;
ALTER TABLE tcalendario CHANGE COLUMN icono icono VARCHAR(200) NULL;
ALTER TABLE tcalendario CHANGE COLUMN hora hora TIME NULL;
ALTER TABLE tcalendario CHANGE COLUMN barrio barrio VARCHAR(75) NULL;
ALTER TABLE tcalendario CHANGE COLUMN altura altura NUMERIC(11) NULL;
ALTER TABLE tcalendario CHANGE COLUMN curso_eventos curso_eventos INT(11) NULL;
ALTER TABLE tcalendario ADD COLUMN tipo_evento VARCHAR(200) NULL;

-- Modificaciones para la tabla notificaciones
ALTER TABLE notificaciones DROP COLUMN curso_notificacion;
DROP TABLE notificacion_vista_por;
ALTER TABLE notificaciones ADD COLUMN curso_notificacion INT NOT NULL;
ALTER TABLE notificaciones ADD FOREIGN KEY(curso_notificacion) REFERENCES curso(id_curso);
ALTER TABLE notificaciones ADD COLUMN fecha_hora DATETIME;
ALTER TABLE notificaciones CHANGE COLUMN fecha_hora fecha_hora DATETIME NOT NULL;
ALTER TABLE notificaciones ADD COLUMN tipo_notificacion INT NOT NULL;
ALTER TABLE notificaciones ADD FOREIGN KEY (tipo_notificacion) references tipo_notificaciones(id_notificaciones);

INSERT INTO tipo_notificaciones VALUES(1,"NOTIFICACIONES DE BIENVENIDA");
INSERT INTO tipo_notificaciones VALUES(2,"NOTIFICACIONES DE LUGARES TURISTICOS");
INSERT INTO tipo_notificaciones VALUES(3,"APERTURA ETAPA 1 DISENIO");
INSERT INTO tipo_notificaciones VALUES(4,"APERTURA ETAPA 2 DISENIO");
INSERT INTO tipo_notificaciones VALUES(5,"NOTIFICACION DISENIOS GANADORES");
INSERT INTO tipo_notificaciones VALUES(6,"APERTURA DE ETAPA 3 DISENIO");
INSERT INTO tipo_notificaciones VALUES(7,"APERTURA DE ETAPA 4 DISENIO");
INSERT INTO tipo_notificaciones VALUES(8,"NOTIFICACION INICIO DE PROPUESTA DE LUGARES UPD");
INSERT INTO tipo_notificaciones VALUES(9,"NOTIFICACION AVISO DE FINALIZACION DE PROPUESTA DE LUGARES UPD");
INSERT INTO tipo_notificaciones VALUES(10,"NOTIFICACIONES INICIO DE CALIFICACION DE LUGARES UPD");
INSERT INTO tipo_notificaciones VALUES(11,"NOTIFICACIONES DE LUGAR GANADOR UPD");
INSERT INTO tipo_notificaciones VALUES(12,"NOTIFICACION INICIO DE PROPUESTA DE LUGARES FIESTA DE EGRESADOS");
INSERT INTO tipo_notificaciones VALUES(13,"NOTIFICACION AVISO DE FINALIZACION DE PROPUESTA DE LUGARES FIESTA DE EGRESADOS");
INSERT INTO tipo_notificaciones VALUES(14,"NOTIFICACIONES INICIO DE CALIFICACION DE LUGARES FIESTA DE EGRESADOS");
INSERT INTO tipo_notificaciones VALUES(15,"NOTIFICACIONES LUGAR GANADOR FIESTA DE EGRESADOS");

ALTER TABLE notificaciones CHANGE COLUMN resumen resumen VARCHAR(200) NOT NULL;

-- MODIFICACIONES ROMINA
-- ALTERS PARA TABLA COMENTARIO-COMENTARIO EMPRESAS-FIESTA-DISEÑO-UPD
ALTER TABLE `comentario` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE;
ALTER TABLE `comentario_empresas` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE;
ALTER TABLE `fiesta` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `disenio` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `upd` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;

ALTER TABLE `empresa` DROP `altura`, DROP `localidad`, DROP `codigo_postal`, DROP `partido`, DROP `provincia`;
ALTER TABLE `empresa` ADD `logo` MEDIUMBLOB NULL;

ALTER TABLE `empresa` CHANGE `facebook` `facebook` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `empresa` CHANGE `pagina_web` `pagina_web` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `empresa` CHANGE `twitter` `twitter` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `empresa` CHANGE `instagram` `instagram` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

-- BORRADOS EN CASCADA Y ACTUALIZACIONES EN CASCADA

ALTER TABLE `agenda` DROP FOREIGN KEY `agenda_ibfk_1`; 
ALTER TABLE `agenda` ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `calificacion` DROP FOREIGN KEY `calificacion_ibfk_1`; 
ALTER TABLE `calificacion` ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE `calificacion` DROP FOREIGN KEY `calificacion_ibfk_2`; 
ALTER TABLE `calificacion` ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `egdo_db`.`empresa`(`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `comentario` DROP FOREIGN KEY `comentario_ibfk_1`; 
ALTER TABLE `comentario` ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `comentario_empresas` DROP FOREIGN KEY `comentario_empresas_ibfk_2`; 
ALTER TABLE `comentario_empresas` ADD CONSTRAINT `comentario_empresas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `curso_pdf` DROP FOREIGN KEY `curso_pdf_ibfk_1`; 
ALTER TABLE `curso_pdf` ADD CONSTRAINT `curso_pdf_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE disenio DROP FOREIGN KEY disenio_ibfk_1;
ALTER TABLE `disenio` ADD FOREIGN KEY (`id_usuario_subio`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

-- MAS ALTERS

ALTER TABLE `evento` ADD INDEX(`id_usuario`);
ALTER TABLE `evento` ADD FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `fiesta` ADD INDEX(`id_usuario_propuesta`);
ALTER TABLE `fiesta` ADD FOREIGN KEY (`id_usuario_propuesta`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `medidas_bandera` DROP FOREIGN KEY `medidas_bandera_ibfk_1`; ALTER TABLE `medidas_bandera` ADD CONSTRAINT `medidas_bandera_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `mensajes_privado` ADD INDEX(`id_emisor`);
ALTER TABLE `mensajes_privado` ADD FOREIGN KEY (`id_emisor`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `mensajes_privado` ADD INDEX(`id_receptor`);
ALTER TABLE `mensajes_privado` ADD FOREIGN KEY (`id_receptor`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `notificacion_vista_por` DROP FOREIGN KEY `notificacion_vista_por_ibfk_1`; 
ALTER TABLE `notificacion_vista_por` ADD CONSTRAINT `notificacion_vista_por_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `notificacion_vista_por` DROP FOREIGN KEY `notificacion_vista_por_ibfk_3`; 
ALTER TABLE `notificacion_vista_por` ADD CONSTRAINT `notificacion_vista_por_ibfk_3` FOREIGN KEY (`curso_notificacion`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `talles_curso` DROP FOREIGN KEY `talles_curso_ibfk_2`; 
ALTER TABLE `talles_curso` ADD CONSTRAINT `talles_curso_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `talles_curso` DROP FOREIGN KEY `talles_curso_ibfk_3`; 
ALTER TABLE `talles_curso` ADD CONSTRAINT `talles_curso_ibfk_3` FOREIGN KEY (`curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tcalendario` DROP FOREIGN KEY `curso_eventos_fk`; 
ALTER TABLE `tcalendario` ADD CONSTRAINT `curso_eventos_fk` FOREIGN KEY (`curso_eventos`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `upd` ADD INDEX(`id_usuario_propuesta`);
ALTER TABLE `upd` ADD FOREIGN KEY (`id_usuario_propuesta`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `actividad_disenio` ADD INDEX(`usuario_apertura`);
ALTER TABLE `actividad_disenio` ADD FOREIGN KEY (`usuario_apertura`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

-- DATE TIMESTAMP

ALTER TABLE `fiesta` ADD `fecha_creacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE `disenio` ADD `fecha_creacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ; 

ALTER TABLE `upd` ADD `fecha_creacion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ;