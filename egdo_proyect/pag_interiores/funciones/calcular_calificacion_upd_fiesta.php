<?php
function calcular($conexion,$id_lugar,$tabla_sql){
	//id_lugar es el id del lugar de upd o fiesta
	//tabla_sql va indiciar el nombre de la tabla de la cual obtener la calificacion
	$buscarCalificacion = "select count(calificacion) as cantidad from calificacion_".$tabla_sql." where id_lugar = '$id_lugar';
												 select sum(valor) as cantidad from calificacion_".$tabla_sql." where id_lugar = '$id_lugar';";
					 
	if ($conexion->multi_query($buscarCalificacion)) {
		do{
       /* almacenar primer juego de resultados */
        if($result = $conexion->store_result()) {
           					  			
           $row = $result->fetch_array(MYSQLI_ASSOC);
                					
            $operands[] = $row;
           $result->free();
        }
        		/* mostrar divisor */
        if ($conexion->more_results()) {
          
        }
    }while ($conexion->more_results() && $conexion->next_result());
	}

	if($operands[1]["cantidad"] == 0){
		$calificacion = 0;
	}else{
		$division = $operands[1]["cantidad"]/$operands[0]["cantidad"];
		$calificacion = round($division, 1);
		$calificacion = floatval($calificacion);
 	}
return $calificacion;
}

?>