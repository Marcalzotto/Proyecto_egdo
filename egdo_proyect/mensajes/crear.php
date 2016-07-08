<?php include ("../bloqueSeguridad.php");?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Crear Mensajes - Usuarios</title>
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
	echo '<h3 ALIGN="left"> Bienvenido usuario: &nbsp;&nbsp;&nbsp;'.$_SESSION['nombre'].' </h3>'
	?>

<div ALIGN="left" style="font-size:130%"><a href="listar.php">Ver mensajes</a> | <a href="crear.php">Crear mensajes</a> | <a href="../index.php">Ir a inicio</a></div><br /><br />

<form method="post" action="enviar.php" >

Para:<br />
<?php
$consulta=mysql_query("SELECT A.descripcion_rol, T.* 
FROM rol A INNER JOIN 
usuario T ON A.id_rol=T.id_rol 
WHERE T.id_rol=1 or T.id_rol=3
", $conexion)
					or die("Problemas en el select:".mysql_error());
			echo '<div class="form-group">';

echo '<select class="form-control" id="sel1" name="usuario_destino">';						
						echo '<option value=""></option>';
						while($fila = mysql_fetch_array($consulta)) {
							echo"<option value='".$fila['id_usuario']."'>".$fila['nombre']." ".$fila['apellido']." (".$fila['descripcion_rol'].")</option>";
						}					
						echo '</select>';
?>
<br />
Asunto:<br />
<input type="text" name="asunto" /><br />
Mensaje:<br />
<textarea name="mensaje"></textarea>
<br /><br />
<input type="submit" name="enviar" value="Enviar" />
</form>



	
</body>
</html>