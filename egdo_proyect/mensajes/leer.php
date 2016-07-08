<?php include ("../bloqueSeguridad.php");?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Leer Mensajes - Usuarios</title>
<script type="text/javascript" src="js.js">
</script>
</head>
<body>

    <?php

    $conexion = mysql_connect("localhost", "root", "")
      or die("Problemas en la conexion");
    
    mysql_select_db("egdo_db", $conexion) 
      or die("Problemas en la seleccion de la base de datos");
    ?>



<?php 

# Obtenemos el mensaje privado
$id = $_GET['id_mensaje'];
//$sql = "SELECT * FROM mensajes_privado WHERE id_receptor='".$_SESSION['id_usuario']."' and id_mensaje='".$id."'";
$sql = "SELECT A.nombre, A.apellido, T.* FROM usuario A INNER JOIN mensajes_privado T ON A.id_usuario=T.id_emisor WHERE T.id_receptor='".$_SESSION['id_usuario']."' and id_mensaje='".$id."'";

$res = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_assoc($res);
?>

<?php
	echo '<h3 ALIGN="left"> Bienvenido usuario: &nbsp;&nbsp;&nbsp;'.$_SESSION['nombre'].' </h3>'
	?>
<div ALIGN="left" style="font-size:130%"><a href="listar.php">Ver mensajes</a> | <a href="crear.php">Crear mensajes</a> | <a href="../index.php">Ir a inicio</a></div><br /><br />
<strong>De:</strong> <?=$row['nombre']?> <?=$row['apellido']?><br />
<strong>Fecha:</strong> <?=$row['fecha_hora']?><br />
<strong>Asunto:</strong> <?=$row['asunto']?><br /><br />
<strong>Mensaje:</strong><br />
<?=$row['mensaje']?>


</body>
</html>