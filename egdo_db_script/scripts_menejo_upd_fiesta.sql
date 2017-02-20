-- Script_manejo_upd_fiesta

-- Alteracion de fechas para fiesta, restar dias para adelantar etapa

SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso = 2 and id_actividad = 3;
SELECT @fecha:= date_add(@fecha_tomar, INTERVAL -7 DAY);/*INTERVAL = -X*/

UPDATE evento SET fecha_hora = @fecha WHERE id_curso = 2 and id_actividad = 3; 

/*retrasar etapas de la fiesta*/

SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso = 2 and id_actividad = 3;
SELECT @fecha:= date_add(@fecha_tomar, INTERVAL +7 DAY);/*INTERVAL = +X*/

UPDATE evento SET fecha_hora = @fecha WHERE id_curso = 2 and id_actividad = 3; 



-- Alteracion de fechas para UPD, restar dias para adelantar etapa

SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso = 2 and id_actividad = 2;
SELECT @fecha:= date_add(@fecha_tomar, INTERVAL -6 DAY);/*INTERVAL = -7*/

UPDATE evento SET fecha_hora = @fecha WHERE id_curso = 2 and id_actividad = 2; 

/*retrasar etapas de upd*/

SELECT @fecha_tomar:= fecha_hora FROM evento WHERE id_curso = 2 and id_actividad = 2;
SELECT @fecha:= date_add(@fecha_tomar, INTERVAL +7 DAY);/*INTERVAL = -7*/

UPDATE evento SET fecha_hora = @fecha WHERE id_curso = 2 and id_actividad = 2; 
