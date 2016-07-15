<?php

/*archivo para conectarse a la base de datos*/

$conexion = new mysqli("localhost","root","","egdo_db");
if($conexion->connect_errno){
	die("Error en la conexion con la base de datos: ".$conexion->connect_error);
}

/*dejo algunos ejemplos de como se puede usar el estilo orientado a objetos*/

/*Si por ejemplo yo hago una consulta y quero imprimir un conjunto de resultados*/

// $crearConsulta = "Aca escribo la consulta de ejemplo";
	
//Ejecuto la consulta

// $guardarConjuntoDeResultados = $conexion->query($crearConsulta) or die($conexion->error);

//verifico si la consulta se realizo con exito

//if($guardarConjuntoDeResultados){

		//si la consulta se realizo con exito, 
	//tengo que verificar si contiene registros en el caso que sea alguna tipo select

	//$traerCantidadRegistros = $guardarConjuntoDeResultados->num_rows; Con el metodo num_rows puedo 
	//																																	puedo saber cuantos registros trae la consulta
	//if($traerCantidadRegistros == 0){
		//echo "la consulta fue exitosa pero esta vacia";
	
	//}else{
		/*En esta parte empizo a guardar cada registro en la variable $deAunRegistro por medio del metodo fetch_array()
		En los parentesis pueden poner alguno de los 3 parametros, MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH,
		 MYSQLI_ASSOC hace que el metodo fetch_array devuelva un array asociativo por nombre de campo, como mysqli_fetch_assoc
		 MYSQLI_NUM hace que el metodo fetch_array devuelva un array asociativo por numero de columna, como mysqli_fetch_row
		 MYSQLI_BOTH hace que el metodo fetch_array devuelva un array asociativo que que se puede manejar de ambas las formas arriba
		 mencionadas.
		*/
		/*while($deAunRegistro = $traerCantidadRegistros->fetch_array(MYSQLI_ASSOC)){
				
				$vectorConCadaRegistro[] = $deAunRegistro;
		}

		foreach ($vectorConCadaRegistro as $unSoloRegistro) {
			echo $unSoloRegistro["campo1"]." ".$unSoloRegistro["campo2"];
		}*/
	
	/*}

}else{
	echo "hubo error al ejecutar la consulta";
}	*/
?>