<?php include ("../bloqueSeguridad.php");?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Mensajes - Usuarios</title>
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
	//$sqlCapacidad = "SELECT max_msj_priv FROM usuario WHERE usuario='".$_SESSION['usuario']."'";
	//$resultado = mysql_query($sqlCapacidad, $conexion) or die(mysql_error());
	//$rowCapacidad = mysql_fetch_assoc($resultado);
	//echo '<h3 ALIGN="left"> Bienvenido usuario: &nbsp;&nbsp;&nbsp;'.$_SESSION['usuario'].' </h3>
	//	  <h3 ALIGN="left"> Limite de almacenamiento: &nbsp;&nbsp;&nbsp;'.$rowCapacidad['max_msj_priv'].' mensajes</h3>'
	?>

<?php
	
	# Buscamos los mensajes privados
//$sql = "SELECT * FROM mensajes_privado WHERE id_receptor='".$_SESSION['id_usuario']."'";
$sql = "SELECT A.nombre, A.apellido, T.* FROM usuario A INNER JOIN mensajes_privado T ON A.id_usuario=T.id_emisor WHERE T.id_receptor='".$_SESSION['id_usuario']."'";
$res = mysql_query($sql, $conexion) or die(mysql_error());

?>
<div ALIGN="left" style="font-size:130%"><a href="listar.php">Ver mensajes</a> | <a href="crear.php">Crear mensajes</a> | <a href="../index.php">Ir a inicio</a></div><br /><br />
  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
	  <td width="426" align="center" valign="top"><strong>Mensaje Nro</strong></td>
      <td width="426" align="center" valign="top"><strong>Asunto</strong></td>
      <td width="321" align="center" valign="top"><strong>De</strong></td>
	  <td width="321" align="center" valign="top"><strong>Fecha</strong></td>
	  <td width="321" align="center" valign="top"><strong>Eliminar</strong></td>
    </tr>
    <?php
	$i = 0; 
	while($row = mysql_fetch_assoc($res)){ ?>
    <tr bgcolor="#b2ffff">
	  <td align="center" valign="top"><?=$i+1?></td>
      <td align="center" valign="top"><a href="leer.php?id_mensaje=<?=$row['id_mensaje']?>"><?=$row['asunto']?></a></td>
      <td align="center" valign="top"><?=$row['nombre']?> <?=$row['apellido']?></td>
	  <td align="center" valign="top"><?=$row['fecha_hora']?></td>
	  <td align="center" valign="top"><a href="eliminar.php?id_mensaje=<?=$row['id_mensaje']?>"><img alt="" src="images/delete.png" width="15" height="15"></a></td>
    </tr>
<?php $i++; 
} ?>
</table>
	
</body>
</html>