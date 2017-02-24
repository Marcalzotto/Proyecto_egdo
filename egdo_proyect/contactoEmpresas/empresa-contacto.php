<?php
//Conectamos a la base de datos
include('../pag_interiores/conexion.php');

//Obtenemos los datos del formulario de registro
$namePOST = $_POST["name"]; 
$emailPOST = $_POST["email"];
$messagePOST = $_POST["message"];


//Filtro anti-XSS
$namePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $namePOST));
$emailPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $emailPOST));
$messagePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $messagePOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresName = "45";
$maxCaracteresEmail = "45";
$maxCaracteresMensaje = "250";


//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($namePOST) > $maxCaracteresName) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresName.' caracteres');
};

if(strlen($emailPOST) > $maxCaracteresEmail) {
	die('El email no puede superar los '.$maxCaracteresEmail.' caracteres');
};

if(strlen($messagePOST) > $maxCaracteresMensaje) {
	die('La contraseña no puede superar los '.$maxCaracteresMensaje.' caracteres');
};

//email
if( empty($emailPOST) )
	die('El campo email no puede estar vacio');
else
{
	// Comprobar mediante  filter_var si es valido el email:
	if(!filter_var($emailPOST,FILTER_VALIDATE_EMAIL )){
		die('El email debe tener un formato valido');
	}
}

//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
//$userPOSTMinusculas = strtolower($userPOST);

//Escribimos la consulta necesaria
//$consultaUsuarios = "SELECT usernamelowercase FROM `mmv005`";

//Obtenemos los resultados
//$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysql_error());
//$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
//$userBD = $datosConsultaUsuarios['usernamelowercase'];

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($namePOST) || empty($emailPOST) || empty($messagePOST)) {
	die('Debes introducir datos válidos');
} 

else {
	$consulta = "INSERT INTO contacto (nombre_empresa, email, mensaje) VALUES ('$namePOST','$emailPOST','$messagePOST')";
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		
		
		require '../registro/Mailer/PHPMailerAutoload.php';
											
		$mail = new PHPMailer;
		$mail->isSMTP();                                      // Activamos SMTP para mailer
		//$mail->SMTPDebug  = 1;
		$mail->Host = 'smtp.gmail.com';                       // Especificamos el host del servidor SMTP
		$mail->SMTPAuth = true;                               // Activamos la autenticacion
		$mail->Username = 'egdo.egresados@gmail.com';       // Correo SMTP
		$mail->Password = 'egdo2016';                // Contraseña SMTP
		$mail->SMTPSecure = 'tls';                            // Activamos la encriptacion ssl
		$mail->Port = 587;                                    // Seleccionamos el puerto del SMTP
		$mail->From = 'egdo.egresados@gmail.com';
		$mail->FromName = 'EGDO';                       // Nombre del que envia el correo
		$mail->isHTML(true); //Decimos que lo que enviamos es HTML
		$mail->CharSet = 'UTF-8';  // Configuramos el charset 
		
		$mensaje = 'La empresa <b>'.$namePOST.'</b> dejo un mensaje: <h2>"'.$messagePOST.'"</h2><br>Correo electronico: '.$emailPOST;
		
		//Agregamos a todos los destinatarios
		$mail->addAddress('egdo.egresados@gmail.com',$namePOST);
		
		//Añadimos el asunto del mail
		$mail->Subject = 'Consulta enviada por una empresa mediante Web';

		//Mensaje del email
		$mail->Body = '<div align="center"><img src="http://i66.tinypic.com/10nua77.png"></div><br><br>'.$mensaje;
		
		if(!$mail->send()) {
		
			echo 'Error al enviar email, verifica tu conexion de internet.';
			
		} 
		else {											
			mysqli_close($conexion);
			die('<script>$(".acceso").val("");</script> Consulta enviada <br> ');
		}
 
	}
		
	 else {
			die('Error al guardar datos');
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>
