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