-- Inserta lugares para fiesta

CALL sp_inserta_lugaresFiesta;



-- Ejecutar SP que FUERZA INICIO DE LA PROPUESTA , ME LLEVA DEL 1 AL 2 DE MARZO

CALL sp_fiesta (2,3);




-- STORE QUE FUERZA INICIO DE CALIFICACION SE LE SUMA 15 DIAS DEL 2 PASA AL 17 DE MARZO

CALL sp_fiesta_1 (2,3); 




-- SP que inserta mas votos para un lugar para fiesta

CALL sp_inserta_calificacionesFiesta();




-- STORE QUE FUERZA MAS VOTOS SE LE SUMA 4 DIAS DEL 17 PASA AL 21 DE MARZO

CALL sp_fiesta_2 (2,3);




-- STORE QUE FUERZA LUGAR GANADOR SE LE SUMA 2 DIAS DEL 21 PASA AL 23 DE MARZO

CALL sp_fiesta_3 (2,3);

