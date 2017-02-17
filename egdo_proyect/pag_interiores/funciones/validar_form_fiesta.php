<?php

if($_POST){
	$expRegNom = '/[^a-zA-Z0-9 ]/';

	$nombre = $_POST["name"];
	if($nombre == ""){
		echo "El nombre del lugar no puede ser vacio.";
	}else if(strlen($nombre) < 5 && strlen($nombre) > 50){
		echo "El nombre del lugar debe tener no menos de 5 caracteres de longitud y no mas de 50.";
	}else if(preg_match($expRegNom, $nombre)){
		echo "El nombre solo puede contener letras y numeros.";
	}else{
		
		echo "El nombre esta bien";
	}

}

?>