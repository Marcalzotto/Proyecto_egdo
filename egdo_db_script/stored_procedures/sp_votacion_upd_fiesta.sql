-- creacion de stored procedures para las etapas de disenio, upd y fiesta

-- stored procedure que fuerza el paso 2 de la actividad diseño
DROP PROCEDURE IF EXISTS sp_disenio_paso_2;
DELIMITER $$
CREATE PROCEDURE sp_disenio_paso_2 (IN _curso INT)
BEGIN

SELECT @fecha_tomar:= fecha_apertura FROM actividad_disenio WHERE curso_pertenece_votacion = _curso;

SELECT @fecha:= date_add(@fecha_tomar, INTERVAL -7 DAY);/*INTERVAL = -7*/

UPDATE actividad_disenio SET fecha_apertura = @fecha WHERE curso_pertenece_votacion = _curso;
END $$
DELIMITER ;

-- SP que fuerza la segunda parte de la votacion(votar el ganador)
DROP PROCEDURE IF EXISTS sp_disenio_paso_2b;
DELIMITER $$
CREATE PROCEDURE sp_disenio_paso_2b (IN _curso INT)
BEGIN 
SELECT @fecha_tomar:= fecha_apertura FROM actividad_disenio WHERE curso_pertenece_votacion = _curso;

SELECT @fecha:= date_add(@fecha_tomar, INTERVAL -2 DAY);/*INTERVAL = -7*/

UPDATE actividad_disenio SET fecha_apertura = @fecha WHERE curso_pertenece_votacion = _curso;
END $$
DELIMITER ;

-- SP que fuerza final de votacion(diseño ganador)
DROP PROCEDURE IF EXISTS sp_disenio_paso_2c;
DELIMITER $$
CREATE PROCEDURE sp_disenio_paso_2c (IN _curso INT)
BEGIN 
SELECT @fecha_tomar:= fecha_apertura FROM actividad_disenio WHERE curso_pertenece_votacion = _curso;

SELECT @fecha:= date_add(@fecha_tomar, INTERVAL -3 DAY);/*INTERVAL = -7*/

UPDATE actividad_disenio SET fecha_apertura = @fecha WHERE curso_pertenece_votacion = _curso;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS sp_inserta_disenios;
DELIMITER $$
CREATE PROCEDURE sp_inserta_disenios()
BEGIN
-- INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(1,1,6,0,0,'images/userDesigns/frontalRemera173527.jpg','images/userDesigns/espaldaRemera173527.jpg','images/userDesigns/total173527.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(2,6,0,0,'images/userDesigns/frontalRemera173527.jpg','images/userDesigns/espaldaRemera173527.jpg','images/userDesigns/total173527.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(3,6,0,0,'images/userDesigns/frontalBandera17857.jpg','images/userDesigns/espaldaBandera17857.jpg','images/userDesigns/total17857.jpg',CURRENT_TIMESTAMP);
/*USUARIO 6 */
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(1,7,0,0,'images/userDesigns/frontalBuzo305484.jpg','images/userDesigns/espaldaBuzo305484.jpg','images/userDesigns/total305484.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(3,7,0,0,'images/userDesigns/frontalBandera807069.jpg','images/userDesigns/espaldaBandera807069.jpg','images/userDesigns/total807069.jpg',CURRENT_TIMESTAMP);
/*USUARIO 7 */
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(1,8,0,0,'images/userDesigns/frontalBuzo196995.jpg','images/userDesigns/espaldaBuzo196995.jpg','images/userDesigns/total196995.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(2,8,0,0,'images/userDesigns/frontalRemera721986.jpg','images/userDesigns/espaldaRemera721986.jpg','images/userDesigns/total721986.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(3,8,0,0,'images/userDesigns/frontalBandera976624.jpg','images/userDesigns/espaldaBandera976624.jpg','images/userDesigns/total976624.jpg',CURRENT_TIMESTAMP);
/*USUARIO 8 */
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(1,9,0,0,'images/userDesigns/frontalBuzo699861.jpg','images/userDesigns/espaldaBuzo699861.jpg','images/userDesigns/total699861.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(2,9,0,0,'images/userDesigns/frontalRemera207859.jpg','images/userDesigns/espaldaRemera207859.jpg','images/userDesigns/total207859.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(3,9,0,0,'images/userDesigns/frontalBandera47459.jpg','images/userDesigns/espaldaBandera47459.jpg','images/userDesigns/total47459.jpg',CURRENT_TIMESTAMP);
/*USUARIO 9 */
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(1,10,0,0,'images/userDesigns/frontalBuzo458316.jpg','images/userDesigns/espaldaBuzo458316.jpg','images/userDesigns/total458316.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(2,10,0,0,'images/userDesigns/frontalRemera926606.jpg','images/userDesigns/espaldaRemera926606.jpg','images/userDesigns/total926606.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(3,10,0,0,'images/userDesigns/frontalBandera127445.jpg','images/userDesigns/espaldaBandera127445.jpg','images/userDesigns/total127445.jpg',CURRENT_TIMESTAMP);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE sp_votos_paso_2(IN _curso INT)
BEGIN 
	-- INSERTAR DISENIOS CON ID'S PREDETERMINADOS Y PARA DESPUES INSERTAR LOS VOTOS
	/*select @actividad_disenio := actividad_disenio_id from actividad_disenio where curso_pertenece_votacion = _curso; 
	
	select @id1 := id_disenio from disenio where codigo_tipo = 1 order by rand() limit 1;
	select @id2 := id_disenio from disenio where codigo_tipo = 1 and id_disenio order by rand() and id_disenio not in(select @id1) limit 1;
	select @id3 := id_disenio from disenio where codigo_tipo = 1 and id_disenio order by rand() and id_disenio not in(select @id1,@id2) limit 1;
	select id_disenio into @id1,@id2 from disenio where codigo_tipo = 1 order by rand();*/
	/*VOTOS DE LOS BUZOS*/  /*10->2,13->4,15->1,25->5*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(6,10,1,1,@actividad_disenio);    /*10->2,13->4,15->1,25->5*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(6,13,1,1,@actividad_disenio);/*---BORRAR PARA VOTARLO EN LA DEMO*/	
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(6,25,1,1,@actividad_disenio);	
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(7,13,1,1,@actividad_disenio);	
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(7,10,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(7,15,1,1,@actividad_disenio);/*---BORRAR PARA VOTARLO EN LA DEMO*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(7,25,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(8,13,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(8,25,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(9,25,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(10,13,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES(10,25,1,1,@actividad_disenio);
	
	/*VOTOS DE LAS REMERAS*/ /*7->4, 11->5, 14->3, 16->1*/ /*20->1, 21->1, 22->3, 23->5, 24->4*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',6,7,2,1,@actividad_disenio);/*7->4, 11->5, 14->3, 16->1*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',6,14,2,1,@actividad_disenio);/*BORRAR PARA VOTAR EN LA DEMO*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',6,11,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,11,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,7,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,16,2,1,@actividad_disenio);/*BORRAR PARA VOTAR EN LA DEMO*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,14,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',8,7,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',8,11,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',9,11,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',10,7,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',10,11,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',10,14,2,1,@actividad_disenio);
	
/*VOTOS DE LAS BANDERAS*/
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',6,22,3,1,@actividad_disenio);/*20->1, 21->1, 22->3, 23->5, 24->4*/
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',6,23,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',6,24,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,20,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,21,3,1,@actividad_disenio);/*Borrar para hacer pruebas*/
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,22,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,23,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',7,24,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',8,23,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',8,24,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',9,23,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',10,22,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',10,23,3,1,@actividad_disenio);
INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,activdad_disenio_num) VALUES('',10,24,3,1,@actividad_disenio);

END $$
DELIMITER ;