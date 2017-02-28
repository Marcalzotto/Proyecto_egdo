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

-- SP que inserta los diseños de remera,buzo,bandera
DROP PROCEDURE IF EXISTS sp_inserta_disenios;
DELIMITER $$
CREATE PROCEDURE sp_inserta_disenios()
BEGIN


INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(1,2,6,0,0,'images/userDesigns/frontalRemera173527.jpg','images/userDesigns/espaldaRemera173527.jpg','images/userDesigns/total173527.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(2,3,6,0,0,'images/userDesigns/frontalBandera17857.jpg','images/userDesigns/espaldaBandera17857.jpg','images/userDesigns/total17857.jpg',CURRENT_TIMESTAMP);
/*USUARIO 6 */
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(3,1,7,0,0,'images/userDesigns/frontalBuzo305484.jpg','images/userDesigns/espaldaBuzo305484.jpg','images/userDesigns/total305484.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(4,3,7,0,0,'images/userDesigns/frontalBandera807069.jpg','images/userDesigns/espaldaBandera807069.jpg','images/userDesigns/total807069.jpg',CURRENT_TIMESTAMP);
/*USUARIO 7 */
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(5,1,8,0,0,'images/userDesigns/frontalBuzo196995.jpg','images/userDesigns/espaldaBuzo196995.jpg','images/userDesigns/total196995.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(6,2,8,0,0,'images/userDesigns/frontalRemera721986.jpg','images/userDesigns/espaldaRemera721986.jpg','images/userDesigns/total721986.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(7,3,8,0,0,'images/userDesigns/frontalBandera976624.jpg','images/userDesigns/espaldaBandera976624.jpg','images/userDesigns/total976624.jpg',CURRENT_TIMESTAMP);
/*USUARIO 8 */
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(8,1,9,0,0,'images/userDesigns/frontalBuzo699861.jpg','images/userDesigns/espaldaBuzo699861.jpg','images/userDesigns/total699861.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(9,2,9,0,0,'images/userDesigns/frontalRemera207859.jpg','images/userDesigns/espaldaRemera207859.jpg','images/userDesigns/total207859.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(10,3,9,0,0,'images/userDesigns/frontalBandera47459.jpg','images/userDesigns/espaldaBandera47459.jpg','images/userDesigns/total47459.jpg',CURRENT_TIMESTAMP);
/*USUARIO 9 */
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(11,1,10,0,0,'images/userDesigns/frontalBuzo458316.jpg','images/userDesigns/espaldaBuzo458316.jpg','images/userDesigns/total458316.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(12,2,10,0,0,'images/userDesigns/frontalRemera926606.jpg','images/userDesigns/espaldaRemera926606.jpg','images/userDesigns/total926606.jpg',CURRENT_TIMESTAMP);
INSERT INTO disenio(id_disenio,codigo_tipo,id_usuario_subio,cantidad_votos,votos_segunda_instancia,path_frontal,path_espalda,path_img_doble,fecha_creacion) VALUES(13,3,10,0,0,'images/userDesigns/frontalBandera127445.jpg','images/userDesigns/espaldaBandera127445.jpg','images/userDesigns/total127445.jpg',CURRENT_TIMESTAMP);
/*USUARIO 10 */

ALTER TABLE disenio AUTO_INCREMENT = 14;

END $$
DELIMITER ;

-- Sp que inserta los votos de la primer instnacia
DROP PROCEDURE IF EXISTS sp_votos_paso_1;
DELIMITER $$
CREATE PROCEDURE sp_votos_paso_1(IN _curso INT)
BEGIN 
	SELECT @actividad_disenio := actividad_disenio_id from actividad_disenio where curso_pertenece_votacion = _curso;	
	
	/*VOTOS DE LOS BUZOS*/  /*11->0,8->4,3->2,5->4*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,5,1,1,@actividad_disenio); 
-- INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,11,1,1,@actividad_disenio);/*---BORRAR PARA VOTARLO EN LA DEMO*/	
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,8,1,1,@actividad_disenio);	
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,5,1,1,@actividad_disenio);	
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,8,1,1,@actividad_disenio);
-- INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,3,1,1,@actividad_disenio);/*---BORRAR PARA VOTARLO EN LA DEMO*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,3,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,5,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,8,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(9,3,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,8,1,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,5,1,1,@actividad_disenio);
	
	/*actializar cantidad de votos en tabla disenio*/
	UPDATE DISENIO SET CANTIDAD_VOTOS = 4 WHERE ID_DISENIO = 8;
	UPDATE DISENIO SET CANTIDAD_VOTOS = 2 WHERE ID_DISENIO = 3;
	UPDATE DISENIO SET CANTIDAD_VOTOS = 4 WHERE ID_DISENIO = 5;
--  UPDATE DISENIO SET CANTIDAD_VOTOS = 0 WHERE ID_DISENIO = 11;


	/*VOTOS DE LAS REMERAS*/ 																/*1->4, 6->6, 9->3, 12->0*/ 
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,6,2,1,@actividad_disenio);
-- INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,14,2,1,@actividad_disenio);/*BORRAR PARA VOTAR EN LA DEMO*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,1,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,6,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,1,2,1,@actividad_disenio);
-- INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,16,2,1,@actividad_disenio);/*BORRAR PARA VOTAR EN LA DEMO*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,9,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,6,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,1,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(9,6,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,6,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,1,2,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,9,2,1,@actividad_disenio);
	
-- Actualizar votos en tabla disenio para las remeras
	UPDATE DISENIO SET CANTIDAD_VOTOS = 4 WHERE ID_DISENIO = 1;
	UPDATE DISENIO SET CANTIDAD_VOTOS = 6 WHERE ID_DISENIO = 6;
	UPDATE DISENIO SET CANTIDAD_VOTOS = 3 WHERE ID_DISENIO = 9;
-- UPDATE DISENIO SET CANTIDAD_VOTOS = 0 WHERE ID_DISENIO = 12;


	/*VOTOS DE LAS BANDERAS*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,10,3,1,@actividad_disenio);/*2->3, 4->2, 7->2, 10->5, 13->0*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,7,3,1,@actividad_disenio);
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,24,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,10,3,1,@actividad_disenio);
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,21,3,1,@actividad_disenio);/*Borrar para hacer pruebas*/
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,4,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,7,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,2,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,10,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,2,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(9,10,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,4,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,10,3,1,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,2,3,1,@actividad_disenio);
	
	-- Actualizando  los votos para las banderas en tabla disenio
	UPDATE DISENIO SET CANTIDAD_VOTOS = 3 WHERE ID_DISENIO = 2;
	UPDATE DISENIO SET CANTIDAD_VOTOS = 2 WHERE ID_DISENIO = 4;
	UPDATE DISENIO SET CANTIDAD_VOTOS = 2 WHERE ID_DISENIO = 7;
	UPDATE DISENIO SET CANTIDAD_VOTOS = 5 WHERE ID_DISENIO = 10;
--  UPDATE DISENIO SET CANTIDAD_VOTOS = 0 WHERE ID_DISENIO = 13;

END $$
DELIMITER ;

-- SP que inserta los votos para la segunda instnacia
DROP PROCEDURE IF EXISTS sp_votos_paso_2;
DELIMITER $$
CREATE PROCEDURE sp_votos_paso_2(IN _curso INT)
BEGIN
	SELECT @actividad_disenio := actividad_disenio_id from actividad_disenio where curso_pertenece_votacion = _curso;	
	/*VOTOS SEGUNDA INSTANCIA*/
	/*VOTOS DE LOS BUZOS*/
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,3,1,2,@actividad_disenio);/*5->0, 3->0, 8->3*/
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,3,1,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num)VALUES(8,8,1,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(9,8,1,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,8,1,2,@actividad_disenio);
	
	-- Actualizando votos de los buzos en en tablas disenño
	-- UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 1 WHERE ID_DISENIO = 10;
	-- UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 13;
	UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 3 WHERE ID_DISENIO = 8;


	/*VOTOS DE LAS REMERAS*/
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,1,2,2,@actividad_disenio);/*1->0, 6->3, 9->0 */
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,1,2,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,6,2,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(9,6,2,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,6,2,2,@actividad_disenio);
	
-- Actualizando votos de las remeras en la tabla diseño 
-- UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 7;
-- UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 11;
   UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 3 WHERE ID_DISENIO = 6;
	
	
	/*VOTOS DE LAS BANDERAS*/
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(6,7,3,2,@actividad_disenio);/*4->0, 7->0, 10->3 */
--  INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(7,10,3,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(8,10,3,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(9,10,3,2,@actividad_disenio);
	INSERT INTO VOTOS(id_usuario_voto,disenio_votado,tipo_disenio,instancia_voto,actividad_disenio_num) VALUES(10,10,3,2,@actividad_disenio);
	
--  UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 1 WHERE ID_DISENIO = 22;
--  UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 23;
    UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 3 WHERE ID_DISENIO = 10;
END $$
DELIMITER ;
