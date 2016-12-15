<?php
function calcular_calificacion($conexion,$id_empresa){


$buscarCalificacion = "select count(id_empresa) as cantidad from calificacion where id_empresa = '$id_empresa';
											 select sum(valor_calificacion) as cantidad from calificacion where id_empresa = '$id_empresa'";
					 
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
    }while ($conexion->next_result());
	}

	$division = $operands[1]["cantidad"]/$operands[0]["cantidad"];
	$calificacion = round($division, 1);
 
return $calificacion;
}

?>