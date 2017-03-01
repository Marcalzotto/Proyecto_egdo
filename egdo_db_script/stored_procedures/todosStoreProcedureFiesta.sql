
-- SP-FIESTA 


DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fiesta`(_curso INT, _act INT)
BEGIN 
SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso= _curso and id_actividad= _act;
SELECT @fecha:= date_add(@fecha_tomar, interval +1 DAY);
UPDATE evento set fecha_hora=@fecha where id_curso=_curso and id_actividad=_act;
END

-- SP-FIESTA-1

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fiesta_1`(_curso INT, _act INT)
BEGIN 
SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso=_curso and id_actividad=_act;
SELECT @fecha:= date_add(@fecha_tomar, interval +14 DAY);
UPDATE evento set fecha_hora=@fecha where id_curso=_curso and id_actividad=_act;
END


-- SP-FIESTA 2

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fiesta_2`(_curso INT, _act INT)
BEGIN 
SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso=_curso and id_actividad=_act;
SELECT @fecha:= date_add(@fecha_tomar, interval +3 DAY);
UPDATE evento set fecha_hora=@fecha where id_curso=_curso and id_actividad=_act;
END

-- SP-FIESTA 3

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fiesta_3`(_curso INT, _act INT)
BEGIN 
SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso=_curso and id_actividad=_act;
SELECT @fecha:= date_add(@fecha_tomar, interval +4 DAY);
UPDATE evento set fecha_hora=@fecha where id_curso=_curso and id_actividad=_act;
END


-- SP INSERTAR CALIFICACIONES

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inserta_calificacionesFiesta`()
BEGIN

INSERT INTO calificacion_fiesta(id_usuario,valor,id_lugar) 
 VALUES ('9','3','11');

INSERT INTO calificacion_fiesta(id_usuario,valor,id_lugar) 
 VALUES ('6','1','11');


INSERT INTO calificacion_fiesta(id_usuario,valor,id_lugar) 
 VALUES ('7','5','11');

INSERT INTO calificacion_fiesta(id_usuario,valor,id_lugar) 
 VALUES ('7','2','12');

INSERT INTO calificacion_fiesta(id_usuario,valor,id_lugar) 
 VALUES ('7','5','12');

update egdo_db.fiesta set calificacion = '1.7' where id_fiesta = '11';
update egdo_db.fiesta set calificaion = '3.5'  where id_fiesta = '12';

END

-- SP INSERTA LUGARES FIESTA

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inserta_lugaresFiesta`()
BEGIN

INSERT INTO fiesta(nombre,telefono,facebook, twitter, instagram,pagina_web,detalles_adicionales,foto_perfil,foto_lugar,id_actividad,id_usuario_propuesta, estado_moderar,fecha_creacion,calle,altura,id_curso,calificacion,estado_moderar1) 
 VALUES ('german', '1133334455', 'facebook.com&#x2F;marquel', '', '', '', 'german german ang ang ang, tengo sueÃ±o y aun no esta todo listo.', 'lugares_fiesta/8IMG-20160124-WA0016.jpg', 'lugares_fiesta/20IMG-20160124-WA0020.jpg', '3', '7', '0', '2017-03-01 06:28:10', 'Av. siempre viva', '1500', '2', '0.0', '0');


INSERT INTO fiesta(nombre,telefono,facebook, twitter, instagram,pagina_web,detalles_adicionales,foto_perfil,foto_lugar,id_actividad,id_usuario_propuesta, estado_moderar,fecha_creacion,calle,altura,id_curso,calificacion,estado_moderar1) 
 VALUES ('El cedron ', '1599022211', 'facebook.com&#x2F;elcedron', '', '', '', 'Esta es una pizzeria de mi barrio.', 'lugares_fiesta/4el_cedron.png', 'lugares_fiesta/6el_cedron2.jpg', '3', '8', '0', '2017-03-01 13:12:53', 'av directorio', '119888', '2', '0.0', '0');

END