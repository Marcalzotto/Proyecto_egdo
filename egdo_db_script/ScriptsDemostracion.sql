/*PRECARGA DE DISEÑOS PARA ALGUNOS USUARIOS EN LA ETAPA 1*/
/*ID_USUARIO = 6 NOELIA ADMINISTADOR CURSO 2*/

INSERT INTO disenio VALUES('',2,6,0,0,'images/userDesigns/frontalRemera511691.jpg','images/userDesigns/espaldaRemera511691.jpg','images/userDesigns/total511691.jpg');
INSERT INTO disenio VALUES('',3,6,0,0,'images/userDesigns/frontalBandera17857.jpg','images/userDesigns/espaldaBandera17857.jpg','images/userDesigns/total17857.jpg');
/*USUARIO 6 */
INSERT INTO disenio VALUES('',1,7,0,0,'images/userDesigns/frontalBuzo305484.jpg','images/userDesigns/espaldaBuzo305484.jpg','images/userDesigns/total305484.jpg');
INSERT INTO disenio VALUES('',3,7,0,0,'images/userDesigns/frontalBandera807069.jpg','images/userDesigns/espaldaBandera807069.jpg','images/userDesigns/total807069.jpg');
/*USUARIO 7 */
INSERT INTO disenio VALUES('',1,8,0,0,'images/userDesigns/frontalBuzo541384.jpg','images/userDesigns/espaldaBuzo541384.jpg','images/userDesigns/total541384.jpg');
INSERT INTO disenio VALUES('',2,8,0,0,'images/userDesigns/frontalRemera721986.jpg','images/userDesigns/espaldaRemera721986.jpg','images/userDesigns/total721986.jpg');
INSERT INTO disenio VALUES('',3,8,0,0,'images/userDesigns/frontalBandera976624.jpg','images/userDesigns/espaldaBandera976624.jpg','images/userDesigns/total976624.jpg');
/*USUARIO 8 */
INSERT INTO disenio VALUES('',1,9,0,0,'images/userDesigns/frontalBuzo699861.jpg','images/userDesigns/espaldaBuzo699861.jpg','images/userDesigns/total699861.jpg');
INSERT INTO disenio VALUES('',2,9,0,0,'images/userDesigns/frontalRemera207859.jpg','images/userDesigns/espaldaRemera207859.jpg','images/userDesigns/total207859.jpg');
INSERT INTO disenio VALUES('',3,9,0,0,'images/userDesigns/frontalBandera47459.jpg','images/userDesigns/espaldaBandera47459.jpg','images/userDesigns/total47459.jpg');
/*USUARIO 9 */
INSERT INTO disenio VALUES('',1,10,0,0,'images/userDesigns/frontalBuzo458316.jpg','images/userDesigns/espaldaBuzo458316.jpg','images/userDesigns/total458316.jpg');
INSERT INTO disenio VALUES('',2,10,0,0,'images/userDesigns/frontalRemera926606.jpg','images/userDesigns/espaldaRemera926606.jpg','images/userDesigns/total926606.jpg');
INSERT INTO disenio VALUES('',3,10,0,0,'images/userDesigns/frontalBandera127445.jpg','images/userDesigns/espaldaBandera127445.jpg','images/userDesigns/total127445.jpg');
/*USUARIO 10 */
select * from disenio;
select * from usuario;
/*----------------------------------------------------------*/
/*PASAR A LA VOTACION*/

SELECT @fecha_tomar:= fecha_apertura FROM actividad_disenio WHERE curso_pertenece_votacion = 2;
SELECT @fecha:= date_add(@fecha_tomar, INTERVAL -3 DAY);/*INTERVAL = -7*/

UPDATE actividad_disenio SET fecha_apertura = @fecha WHERE curso_pertenece_votacion = 2;

/*VOLVER A LA ETAPA ANTERIOR*/

SELECT @fecha_tomar:= fecha_apertura FROM actividad_disenio WHERE curso_pertenece_votacion = 2;
SELECT @fecha:= date_add(@fecha_tomar, INTERVAL +5 DAY); /*ITERVAL = +7*/

UPDATE actividad_disenio SET fecha_apertura = @fecha WHERE curso_pertenece_votacion = 2;


select * from actividad_disenio;
/*----------------------------------------------------------*/
/*VOTOS PARA LA PRIMER INSTANACIA*/
SELECT * FROM VOTOS;
/*VOTOS DE LOS BUZOS*/
INSERT INTO VOTOS VALUES('',6,10,1,1,7);    /*10->2,13->4,15->1,25->5*/
INSERT INTO VOTOS VALUES('',6,13,1,1,7);/*---BORRAR PARA VOTARLO EN LA DEMO*/	
INSERT INTO VOTOS VALUES('',6,25,1,1,7);	
INSERT INTO VOTOS VALUES('',7,13,1,1,7);	
INSERT INTO VOTOS VALUES('',7,10,1,1,7);
INSERT INTO VOTOS VALUES('',7,15,1,1,7);/*---BORRAR PARA VOTARLO EN LA DEMO*/
INSERT INTO VOTOS VALUES('',7,25,1,1,7);
INSERT INTO VOTOS VALUES('',8,13,1,1,7);
INSERT INTO VOTOS VALUES('',8,25,1,1,7);
INSERT INTO VOTOS VALUES('',9,25,1,1,7);
INSERT INTO VOTOS VALUES('',10,13,1,1,7);
INSERT INTO VOTOS VALUES('',10,25,1,1,7);

UPDATE DISENIO SET CANTIDAD_VOTOS = 2 WHERE ID_DISENIO = 10;
UPDATE DISENIO SET CANTIDAD_VOTOS = 4 WHERE ID_DISENIO = 13;
UPDATE DISENIO SET CANTIDAD_VOTOS = 1 WHERE ID_DISENIO = 15;
UPDATE DISENIO SET CANTIDAD_VOTOS = 5 WHERE ID_DISENIO = 25;

/*VOTOS DE LAS REMERAS*/
INSERT INTO VOTOS VALUES('',6,7,2,1,7);/*7->4, 11->5, 14->3, 16->1*/
INSERT INTO VOTOS VALUES('',6,14,2,1,7);/*BORRAR PARA VOTAR EN LA DEMO*/
INSERT INTO VOTOS VALUES('',6,11,2,1,7);
INSERT INTO VOTOS VALUES('',7,11,2,1,7);
INSERT INTO VOTOS VALUES('',7,7,2,1,7);
INSERT INTO VOTOS VALUES('',7,16,2,1,7);/*BORRAR PARA VOTAR EN LA DEMO*/
INSERT INTO VOTOS VALUES('',7,14,2,1,7);
INSERT INTO VOTOS VALUES('',8,7,2,1,7);
INSERT INTO VOTOS VALUES('',8,11,2,1,7);
INSERT INTO VOTOS VALUES('',9,11,2,1,7);
INSERT INTO VOTOS VALUES('',10,7,2,1,7);
INSERT INTO VOTOS VALUES('',10,11,2,1,7);
INSERT INTO VOTOS VALUES('',10,14,2,1,7);

UPDATE DISENIO SET CANTIDAD_VOTOS = 4 WHERE ID_DISENIO = 7;
UPDATE DISENIO SET CANTIDAD_VOTOS = 5 WHERE ID_DISENIO = 11;
UPDATE DISENIO SET CANTIDAD_VOTOS = 3 WHERE ID_DISENIO = 14;
UPDATE DISENIO SET CANTIDAD_VOTOS = 1 WHERE ID_DISENIO = 16;

/*VOTOS DE LAS BANDERAS*/
INSERT INTO VOTOS VALUES('',6,22,3,1,7);/*20->1, 21->1, 22->3, 23->5, 24->4*/
INSERT INTO VOTOS VALUES('',6,23,3,1,7);
INSERT INTO VOTOS VALUES('',6,24,3,1,7);
INSERT INTO VOTOS VALUES('',7,20,3,1,7);
INSERT INTO VOTOS VALUES('',7,21,3,1,7);/*Borrar para hacer pruebas*/
INSERT INTO VOTOS VALUES('',7,22,3,1,7);
INSERT INTO VOTOS VALUES('',7,23,3,1,7);
INSERT INTO VOTOS VALUES('',7,24,3,1,7);
INSERT INTO VOTOS VALUES('',8,23,3,1,7);
INSERT INTO VOTOS VALUES('',8,24,3,1,7);
INSERT INTO VOTOS VALUES('',9,23,3,1,7);
INSERT INTO VOTOS VALUES('',10,22,3,1,7);
INSERT INTO VOTOS VALUES('',10,23,3,1,7);
INSERT INTO VOTOS VALUES('',10,24,3,1,7);

UPDATE DISENIO SET CANTIDAD_VOTOS = 1 WHERE ID_DISENIO = 20;
UPDATE DISENIO SET CANTIDAD_VOTOS = 1 WHERE ID_DISENIO = 21;
UPDATE DISENIO SET CANTIDAD_VOTOS = 3 WHERE ID_DISENIO = 22;
UPDATE DISENIO SET CANTIDAD_VOTOS = 5 WHERE ID_DISENIO = 23;
UPDATE DISENIO SET CANTIDAD_VOTOS = 4 WHERE ID_DISENIO = 24;
/*--------------------------------*/

/*FORZAR SEGUNDA INSTANCIA*/
SELECT @fecha_tomar:= fecha_apertura FROM actividad_disenio WHERE curso_pertenece_votacion = 2;
SELECT @fecha:= date_add(@fecha_tomar, INTERVAL -1 DAY);

UPDATE actividad_disenio SET fecha_apertura = @fecha WHERE curso_pertenece_votacion = 2;
/*----------------------------------------------------------*/

/*VOTOS SEGUNDA INSTANCIA*/
/*VOTOS DE LOS BUZOS*/

INSERT INTO VOTOS VALUES('',6,25,1,2,7);/*10->1, 13->2, 25->2*/
INSERT INTO VOTOS VALUES('',7,25,1,2,7);
INSERT INTO VOTOS VALUES('',8,13,1,2,7);
INSERT INTO VOTOS VALUES('',9,13,1,2,7);
INSERT INTO VOTOS VALUES('',10,10,1,2,7);

UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 1 WHERE ID_DISENIO = 10;
UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 13;
UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 25;
/*VOTOS DE LAS REMERAS*/
INSERT INTO VOTOS VALUES('',6,11,2,2,7);/*7->2, 11->2, 14->1 */
INSERT INTO VOTOS VALUES('',7,11,2,2,7);
INSERT INTO VOTOS VALUES('',8,7,2,2,7);
INSERT INTO VOTOS VALUES('',9,7,2,2,7);
INSERT INTO VOTOS VALUES('',10,14,2,2,7);

UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 7;
UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 11;
UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 1 WHERE ID_DISENIO = 14;

/*VOTOS DE LAS BANDERAS*/
INSERT INTO VOTOS VALUES('',6,23,3,2,7);/*22->1, 23->2, 24->2 */
INSERT INTO VOTOS VALUES('',7,23,3,2,7);
INSERT INTO VOTOS VALUES('',8,24,3,2,7);
INSERT INTO VOTOS VALUES('',9,24,3,2,7);
INSERT INTO VOTOS VALUES('',10,22,3,2,7);

UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 1 WHERE ID_DISENIO = 22;
UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 23;
UPDATE DISENIO SET VOTOS_SEGUNDA_INSTANCIA = 2 WHERE ID_DISENIO = 24;
