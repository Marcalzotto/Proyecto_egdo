<?php include ("../bloqueSeguridad.php");?>

<?php


    

    $conexion = mysql_connect("localhost", "root", "")
      or die("Problemas en la conexion");
    
    mysql_select_db("egdo_db", $conexion) 
      or die("Problemas en la seleccion de la base de datos");
  
	
	echo '<h3 ALIGN="left"> Bienvenido usuario: &nbsp;&nbsp;&nbsp;'.$_SESSION['nombre'].' </h3>
	<div ALIGN="left" style="font-size:130%"><a href="listar.php">Ver mensajes</a> | <a href="crear.php">Crear mensajes</a> | <a href="../index.php">Ir a inicio</a></div><br /><br />';

		
		@$id_receptor = $_POST['id_receptor'];
		@$asunto = $_POST['asunto'];
		@$mensaje = $_POST['mensaje'];
		
			//Establecemos zona horaria para obtener fecha
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha_hora = date("Y-n-d-H-i-s");
			
			$sql = "INSERT INTO mensajes_privado (id_receptor,id_emisor,fecha_hora,asunto,mensaje) VALUES ('".$id_receptor."','".$_SESSION['id_usuario']."','".$fecha_hora."','".$asunto."','".$mensaje."')";
			mysql_query($sql,$conexion);
			echo "<h1 ALIGN='center'>Mensaje enviado correctamente</h1>";
	

?>