-- Ejecutar SP que FUERZA INICIO DE LA PROPUESTA , ME LLEVA DEL 1 AL 2 DE MARZO

CALL sp_fiesta (2,3);

-- STORE QUE FUERZA INICIO DE CALIFICACION SE LE SUMA 15 DIAS DEL 1 PASA AL 16 DE MARZO

CALL sp_fiesta_1 (2,3); 

-- SP que inserta mas votos para un lugar para fiesta

CALL sp_inserta_calificacionesFiesta();

-- STORE QUE FUERZA MAS VOTOS SE LE SUMA 3 DIAS DEL 16 PASA AL 19 DE MARZO

CALL sp_fiesta_2 (2,3);

-- STORE QUE FUERZA LUGAR GANADOR SE LE SUMA 4 DIAS DEL 19 PASA AL 23 DE MARZO

CALL sp_fiesta_3 (2,3);

