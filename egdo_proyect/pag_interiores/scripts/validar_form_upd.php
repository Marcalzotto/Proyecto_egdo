<?php
include("../../bloqueSeguridad.php");
include("../conexion.php");
$usuario = $_SESSION["id_usuario"];
$curso = $_SESSION["curso"];
$fechaHoy = new DateTime();
$fecha_creacion = $fechaHoy->format("Y-m-d H:i:s");
//Expresiones regulares
$expRegNom = '/[^a-zA-Z0-9 ]/';
$expCalle = '/[^a-zA-Z. ]/';
$expAltura = '/[^0-9]/';
$exp_cell = '/^\d{8,13}$/';
$exp_facebook = '/(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/?/';
$exp_twitter = '/(?:(?:http|https):\/\/)?(?:www.)?twitter.com\/?/';
$exp_instagram = '/(?:(?:http|https):\/\/)?(?:www.)?instagram.com\/?/';
$exp_url = '/^(www|http|https:\/\/)(.*\.(ar$|net$|com$))/';
$exp_reg_file = '/^.*\.(jpg|JPG|png|PNG)$/'; 


if($_POST){

	$buscarSiInsertoLugar = "select count(id_upd) as propuesto_cantidad from upd where id_usuario_propuesta = '$usuario'";	
	if($result = $conexion->query($buscarSiInsertoLugar)){
		$reg = $result->fetch_array(MYSQLI_ASSOC);
		$propuso = $reg["propuesto_cantidad"];
		if($propuso != 0){
			echo "Ya has propuesto lugar para UPD, no puedes volver a proponer.";
		}else{//empieza validacion

				$nombre = $_POST["name"];
				$calle = $_POST["calle"];
				$altura = $_POST["altura"];
				$celular = $_POST["cell_phone"];
				$facebook = $_POST["face"];
				$twitter = $_POST["twitter"];
				$instagram = $_POST["insta"];
				$web = $_POST["web_page"];
				$detalles = $_POST["detalles"];
				$nombre_arch_foto_perfil = $_POST["name_foto_perfil"];
				$nombre_arch_foto_lugar = $_POST["name_foto_lugar"];

				//filtrado anti-xss
				$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
				$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
		
				$nombre = str_replace($caracteres_malos, $caracteres_buenos, $nombre);
				$calle = str_replace($caracteres_malos, $caracteres_buenos, $calle);
				$altura = str_replace($caracteres_malos, $caracteres_buenos, $altura);
				$celular = str_replace($caracteres_malos, $caracteres_buenos, $celular);
				$facebook = str_replace($caracteres_malos, $caracteres_buenos, $facebook);
				$twitter = str_replace($caracteres_malos, $caracteres_buenos, $twitter);
				$instagram = str_replace($caracteres_malos, $caracteres_buenos, $instagram);
				$web = str_replace($caracteres_malos, $caracteres_buenos, $web);
				$detalles = str_replace($caracteres_malos, $caracteres_buenos, $detalles);

				//Cambiamos los ENTER por <br>
				$calle = nl2br($calle);
				$celular = nl2br($celular);
				$facebook = nl2br($facebook);
				$instagram = nl2br($instagram);
				$twitter = nl2br($twitter);
				$web = nl2br($web);
				$detalles = nl2br($detalles);


				$errores_requeridos = 0;
				$errores_no_requeridos = 0;

				//validacion en cascada, solo para los campos requeridos 
				if($nombre == ""){
					$errores_requeridos++;
					echo "El nombre del lugar no puede ser vacio.\n";
				}else if(strlen($nombre) < 5 || strlen($nombre) > 50){
					$errores_requeridos++;
					echo "El nombre del lugar debe tener no menos de 5 caracteres de longitud y no mas de 50.\n";
				}else if(preg_match($expRegNom, $nombre)){
					$errores_requeridos++;
					echo "El nombre solo puede contener letras y numeros.\n";
				}else if($calle == ""){
					$errores_requeridos++;
					echo "Por favor introduce el nombre de la calle.\n";
				}else if(preg_match($expCalle, $calle)){
					$errores_requeridos++;
					echo "El nombre de la calle solo puede contener letras.\n";
				}else if($altura == ""){
					$errores_requeridos++;
					echo "Por favor introduce la altura de la calle.\n";
				}else if($altura <= 0){
					$errores_requeridos++;
					echo "Por favor introduce una altura mayor a 0.\n";
				}else if(preg_match($expAltura, $altura)){
					$errores_requeridos++;
					echo "Por favor introduce una altura numerica.\n";
				}else if($celular == ""){
					$errores_requeridos++;
					echo "Por favor introduce el numero telefonico(celular o fijo y sin guiones).\n";
				}else if(!preg_match($exp_cell, $celular)){
					$errores_requeridos++;
					echo "el numero telefonico solo puede tener entre 8 y 13 numeros(13 solo para el interior).\n";
				}else if(preg_match($expAltura, $celular)){
					$errores_requeridos++;
					echo "el este campo solo puede contener numeros.\n";
				}else if($detalles == ""){
					$errores_requeridos++;
					echo "Por favor introduce los detalles adicionales del lugar.\n";
				}else if(strlen($detalles) < 10 || strlen($detalles) > 200){
					$errores_requeridos++;
					echo "Los detalles deben extenderse a no menos de 10 caracteres y no mas de 200 de longitud.\n";
				}else if($_FILES["file_perfil"]["error"] > 0){
					$errores_requeridos++;
					echo "Hubo un error por favor vuelve a enviar la foto de perfil del lugar.";
				}else if($_FILES["file_perfil"]["type"] != "image/jpeg" && $_FILES["file_perfil"]["type"] != "image/png"){
					$errores_requeridos++;
					echo "La extension permitida para las fotos es unicamente PNG o JPG".$_FILES["file_perfil"]["type"]."\n";
				}else if(!preg_match($exp_reg_file, $_FILES["file_perfil"]["name"])){
					$errores_requeridos++;
					echo "La extension de este archivo no coincide con las pedidas(PNG o JPG).\n";
				}else if($_FILES["file_lugar"]["error"] > 0){
					$errores_requeridos++;
					echo "Hubo un error por favor vuelve a enviar la foto del lugar.\n";
				}else if($_FILES["file_lugar"]["type"] != "image/jpeg" && $_FILES["file_lugar"]["type"] != "image/png"){
					$errores_requeridos++;
					echo "La extension permitida para las fotos es unicamente PNG o JPG".$_FILES["file_lugar"]["type"]."\n";
				}else if(!preg_match($exp_reg_file, $_FILES["file_lugar"]["name"])){
					$errores_requeridos++;
					echo "La extension de este archivo no coincide con las pedidas(PNG o JPG).\n";
					//echo "El nombre de este archivo es: ".$_FILES["file_perfil"]["name"];
				}

				//validaciones secundarias, si algun campo es vacia se carga como vacio, sino se evalua bajo la expresion regular
				if($facebook != ""){
		
					if(!preg_match($exp_facebook,$facebook)){
						$errores_no_requeridos++;
						echo "La direccion de facebook no es valida, vuelve a ingresarla.\n";
					}
				}else{
					$facebook = "";
				}

				if($twitter != ""){
					if(!preg_match($exp_twitter,$twitter)){
						$errores_no_requeridos++;
						echo "La direccion de twitter no es valida, vuelve a ingresarla. \n";
					}
				}else{
					$twitter = "";
				}
				if($instagram != ""){
		
					if(!preg_match($exp_instagram,$instagram)){
						$errores_no_requeridos++;
						echo "La direccion de instagram no es valida, vuelve a ingresarla. \n";
					}
				}else{
					$instagram = "";
				}

				if($web != ""){
		
					if(!preg_match($exp_url,$web)){
						$errores_no_requeridos++;
						echo "La direccion de web no es valida, vuelve a ingresarla.\n";
					}
				}else{
					$web = "";
				}
				$cod_perfil = mt_rand(0, 20);
				$cod_lugar = mt_rand(0, 20);

				if($errores_requeridos == 0 && $errores_no_requeridos == 0){
					$path_foto_perfil = "lugares_upd/".$cod_perfil.$_FILES["file_perfil"]["name"];
					$path_foto_lugar = "lugares_upd/".$cod_lugar.$_FILES["file_lugar"]["name"];


$insertLugar = "insert into upd(nombre_lugar,telefono,facebook,twitter,instagram,pagina_web,detalles_adicionales,foto_perfil,foto_lugar,id_actividad,id_usuario_propuesta,fecha_creacion,calle,altura,id_curso) 
		values('$nombre','$celular','$facebook','$twitter','$instagram','$web','$detalles','$path_foto_perfil','$path_foto_lugar',2,'$usuario','$fecha_creacion','$calle','$altura','$curso')";

		if(move_uploaded_file($_FILES["file_perfil"]["tmp_name"], "../../images/".$path_foto_perfil) && move_uploaded_file($_FILES["file_lugar"]["tmp_name"], "../../images/".$path_foto_lugar)){
										if($result = $conexion->query($insertLugar)){
											echo "Sus datos fueron procesados y registrados correctamente";
										}else{
											echo "Algun error raro:".$conexion->error;
											unlink($path_foto_perfil);
											unlink($path_foto_lugar);
										}
								}else{
									echo "hubo problemas al procesar los archivos, por favor intenta subir los datos nuevamente";
								}
				}//fin if si los datos son correctos
				

				//echo "Los datos estan bien validados";
		}//si no propuso un lugar entonces se empieza a validar todo lo que envio
	}else{
		echo "Lo sentimos hubo un error inesperado";
	}
}

?>