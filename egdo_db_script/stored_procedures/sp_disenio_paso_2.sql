-- Ejecutar sp que inserta los diseños de algunos de los usuarios del curso

CALL sp_inserta_disenios();

-- Ejecutar sp_disenio_paso_2 para pasar a votacion

CALL sp_disenio_paso_2 (2); 

-- Ejecutar sp que inserta los votos de la primer instancia

CALL sp_votos_paso_1 (2);

-- Ejecutar sp_disenio_paso_2b pasar a segunda instancia votacion

CALL sp_disenio_paso_2b (2);

-- Ejecutar sp que inserta los votos para la segunda instancia

CALL sp_votos_paso_2 (2);

-- Ejecutar sp_disenio_paso_2c mostrar disenios ganadores

CALL sp_disenio_paso_2c (2);