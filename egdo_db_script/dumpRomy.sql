ALTER TABLE `comentario` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `comentario_empresas` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `fiesta` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `disenio` ADD `estado_mpderar` BOOLEAN NOT NULL DEFAULT FALSE ;
ALTER TABLE `upd` ADD `estado_moderar` BOOLEAN NOT NULL DEFAULT FALSE ;

ALTER TABLE empresa DROP FOREIGN KEY empresa_ibfk_1;
ALTER TABLE `empresa` DROP `id_usuario`;
ALTER TABLE `empresa` DROP `altura`, DROP `localidad`, DROP `codigo_postal`, DROP `partido`, DROP `provincia`;
ALTER TABLE `empresa` ADD `logo` MEDIUMBLOB NULL ;
