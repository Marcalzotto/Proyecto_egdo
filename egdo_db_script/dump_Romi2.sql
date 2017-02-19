-- modificaiones a la base 

ALTER TABLE `actividad_disenio` DROP FOREIGN KEY `actividad_disenio_ibfk_2`; ALTER TABLE `actividad_disenio` ADD CONSTRAINT `actividad_disenio_ibfk_2` FOREIGN KEY (`curso_pertenece_votacion`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `evento` DROP FOREIGN KEY `evento_ibfk_4`; ALTER TABLE `evento` ADD CONSTRAINT `evento_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `imagen` ADD INDEX(`id_curso`);

ALTER TABLE `notificaciones` DROP FOREIGN KEY `notificaciones_ibfk_1`; ALTER TABLE `notificaciones` ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`curso_notificacion`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `usuario` DROP FOREIGN KEY `usuario_ibfk_1`; ALTER TABLE `usuario` ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `calif_fiesta_upd` DROP FOREIGN KEY `calif_fiesta_upd_ibfk_1`; ALTER TABLE `calif_fiesta_upd` ADD CONSTRAINT `calif_fiesta_upd_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `imagen` ADD INDEX(`id_usuario`);

ALTER TABLE `imagen` ADD FOREIGN KEY (`id_usuario`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `votos` DROP FOREIGN KEY `votos_ibfk_1`; ALTER TABLE `votos` ADD CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`id_usuario_voto`) REFERENCES `egdo_db`.`usuario`(`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `comentario_empresas` DROP FOREIGN KEY `comentario_empresas_ibfk_1`; ALTER TABLE `comentario_empresas` ADD CONSTRAINT `comentario_empresas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `egdo_db`.`empresa`(`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;



ALTER TABLE `imagen` ADD FOREIGN KEY (`id_curso`) REFERENCES `egdo_db`.`curso`(`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;
