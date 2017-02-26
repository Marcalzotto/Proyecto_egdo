-- info viaje
use egdo_db;
CREATE TABLE `info_viaje` (
  `id_info_viaje` int(11) NOT NULL,
  `nombre_lugar` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `imagen1` varchar(45) NOT NULL,
  `imagen2` varchar(45) NOT NULL,
  `imagen3` varchar(45) NOT NULL,
  `descripcion1` varchar(250) NOT NULL,
  `descripcion2` varchar(250) NOT NULL,
  `descripcion3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `info_viaje`
  ADD PRIMARY KEY (`id_info_viaje`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `info_viaje_ibfk_3` (`id_usuario`);

ALTER TABLE `info_viaje`
  MODIFY `id_info_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `info_viaje`
  ADD CONSTRAINT `info_viaje_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `info_viaje_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;



-- comentario info viaje

use egdo_db;
CREATE TABLE `comentario_infoviaje` (
  `id_comment` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `id_info_viaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_moderar` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `comentario_infoviaje`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_info_viaje` (`id_info_viaje`);

ALTER TABLE `comentario_infoviaje`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `comentario_infoviaje`
  ADD CONSTRAINT `comentario_infoviaje_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_infoviaje_ibfk_2` FOREIGN KEY (`id_info_viaje`) REFERENCES `info_viaje` (`id_info_viaje`) ON DELETE CASCADE ON UPDATE CASCADE;
