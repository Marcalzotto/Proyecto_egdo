ALTER TABLE `comentario` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `comentario_empresas` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `fiesta` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `disenio` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `upd` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;

ALTER TABLE empresa DROP FOREIGN KEY empresa_ibfk_1;
ALTER TABLE `empresa` DROP `id_usuario`;
ALTER TABLE `empresa` DROP `altura`, DROP `localidad`, DROP `codigo_postal`, DROP `partido`, DROP `provincia`;
ALTER TABLE `empresa` ADD `logo` MEDIUMBLOB NULL ;

ALTER TABLE `empresa` CHANGE `facebook` `facebook` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `empresa` CHANGE `pagina_web` `pagina_web` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `empresa` CHANGE `twitter` `twitter` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `empresa` CHANGE `instagram` `instagram` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

-- UPDATE CASCADA DELETE CASCADA PARA PERMITIR ELIMINACION 

ALTER TABLE `agenda` DROP FOREIGN KEY `agenda_ibfk_1`; ALTER TABLE `agenda` ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `calificacion` DROP FOREIGN KEY `calificacion_ibfk_1`; ALTER TABLE `calificacion` ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `calificacion` DROP FOREIGN KEY `calificacion_ibfk_2`; ALTER TABLE `calificacion` ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `egdo_db`.`empresa`(`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `comentario` DROP FOREIGN KEY `comentario_ibfk_1`; ALTER TABLE `comentario` ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `comentario_empresas` DROP FOREIGN KEY `comentario_empresas_ibfk_2`; ALTER TABLE `comentario_empresas` ADD CONSTRAINT `comentario_empresas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `curso_pdf` DROP FOREIGN KEY `curso_pdf_ibfk_1`; ALTER TABLE `curso_pdf` ADD CONSTRAINT `curso_pdf_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `disenio` ADD FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `evento` ADD INDEX(`id_usuario`);
ALTER TABLE `evento` ADD FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `fiesta` ADD INDEX(`id_usuario_propuesta`);
ALTER TABLE `fiesta` ADD FOREIGN KEY (`id_usuario_propuesta`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `medidas_bandera` DROP FOREIGN KEY `medidas_bandera_ibfk_1`; ALTER TABLE `medidas_bandera` ADD CONSTRAINT `medidas_bandera_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `mensajes_privado` ADD INDEX(`id_emisor`);
ALTER TABLE `mensajes_privado` ADD FOREIGN KEY (`id_emisor`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `mensajes_privado` ADD INDEX(`id_receptor`);
ALTER TABLE `mensajes_privado` ADD FOREIGN KEY (`id_receptor`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `notificacion_vista_por` DROP FOREIGN KEY `notificacion_vista_por_ibfk_1`; ALTER TABLE `notificacion_vista_por` ADD CONSTRAINT `notificacion_vista_por_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `notificacion_vista_por` DROP FOREIGN KEY `notificacion_vista_por_ibfk_3`; ALTER TABLE `notificacion_vista_por` ADD CONSTRAINT `notificacion_vista_por_ibfk_3` FOREIGN KEY (`curso_notificacion`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `talles_curso` DROP FOREIGN KEY `talles_curso_ibfk_2`; ALTER TABLE `talles_curso` ADD CONSTRAINT `talles_curso_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `talles_curso` DROP FOREIGN KEY `talles_curso_ibfk_3`; ALTER TABLE `talles_curso` ADD CONSTRAINT `talles_curso_ibfk_3` FOREIGN KEY (`curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tcalendario` DROP FOREIGN KEY `curso_eventos_fk`; ALTER TABLE `tcalendario` ADD CONSTRAINT `curso_eventos_fk` FOREIGN KEY (`curso_eventos`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `upd` ADD INDEX(`id_usuario_propuesta`);
ALTER TABLE `upd` ADD FOREIGN KEY (`id_usuario_propuesta`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `votacion` ADD INDEX(`id_usuario`);
ALTER TABLE `votacion` ADD FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;