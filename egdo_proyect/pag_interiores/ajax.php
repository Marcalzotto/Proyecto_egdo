<!--<?php //require_once("config.php"); ?>-->
<!DOCTYPE html>
<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_es.js "></script>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href="../assets/css/calendar.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="formulario">
		<!--<?php
		
		//function fecha($fecha,$forma)
		{
			//$trim=explode("-",$fecha);
			/*if (intval($trim[2])<10) $trim[2]="0".$trim[2];
			if ($forma=="es") return $trim[2]."-".$trim[1]."-".$trim[0];
			elseif ($forma=="en") return $trim[0]."-".$trim[1]."-".$trim[2];*/
		}
		
		//switch ($_GET["accion"])
		{
			//case "insertar":
				?><h1>Alta de un evento el <?php //echo fecha($_GET["dia"],"es"); ?></h1><?php
				//if (isset($_POST) && count($_POST)>0)
				{
				/*	$query_eventos=$db->query("insert into tcalendario (fecha,evento) values ('".$_POST["fecha"]."','".$_POST["evento"]."')");
					//if ($query_eventos) echo "<p class='ok'>El evento se ha guardado correctamente.</p>";
					//else echo "<p class='ko'>Se ha producido un error guardando el evento.</p>";
				}
				if (isset($_GET["dia"]) && !isset($_POST["evento"]))
				{*/
					?>-->
					<form action="" method="post" class="datos">
						<fieldset>
							<div><label>Evento:<input type="text" name="evento" value="" class="required"></label></div>
							<div><label>Icono:<input type="file" name="icono" class="required"></label></div>
							<div><label>Color:<select name="color" id="" class="requierd">
																			<option value="0">Elejir Color</option>	
																			<option value="1">Rojo</option>
																			<option value="2">Azul</option>
																			<option value="3">Verde</option>
																</select>
									 </label>
							</div>
							<div><label>Fecha y Hora: <input type="date" name="fechaHora" class="required"></label></div>
							<div><label>Lugar: <input type="text" name="lugarEvento" class="required"></label></div>

<!--<?php //echo fecha($_GET["dia"],"en"); ?> va dentro del valie de input hidden-->
							<div>
								<input type="hidden" name="fecha" value="">
								<input type="submit" value="Insertar Evento">
							</div>
						</fieldset>
					</form>
					<!--<?php
				}
			//break;
			
		/*	case "edicion":*/
				?>--><h1>Editar un evento</h1><!--<?php
				//if (isset($_POST) && count($_POST)>0)
				{
					//$query_eventos=$db->query("update tcalendario set evento='".$_POST["evento"]."' where id='".intval($_POST["idevento"])."'");
					//if ($query_eventos) echo "<p class='ok'>El evento se ha modificado correctamente.</p>";
					//else echo "<p class='ko'>Se ha producido un error modificando el evento.</p>";
				}
				//if (isset($_GET["idevento"]) && !isset($_POST["idevento"]))
				{
					//$query_eventos=$db->query("select id,fecha,evento from tcalendario where 1 and id='".intval($_GET["idevento"])."' limit 1");
					//if ($evento=$query_eventos->fetch_array())
					{
					?>-->
					<form action="" method="post" class="datos">
						<fieldset>
							<!--<?php //echo $evento["evento"]; ?> va dentro del value de input name evento-->
							<div><label>Evento:<input type="text" name="evento" value="" class="required"></label></div>
							<div>
								<!--<?php //echo $evento["id"]; ?>-->
								<input type="hidden" name="idevento" value="">
								<input type="submit" value="Modificar Evento">
							</div>
						</fieldset>
					</form>
					<!--<?php
					}
				}
			//break;
			
		//	case "eliminar":
				?>--><h1>Eliminar un evento</h1><!--<?php
				//if (isset($_POST) && count($_POST)>0)
				{
					//$query_eventos=$db->query("delete from tcalendario where id='".intval($_POST["idevento"])."'");
					//if ($query_eventos) echo "<p class='ok'>El evento se ha eliminado correctamente.</p>";
					//else echo "<p class='ko'>Se ha producido un error eliminando el evento.</p>";
				}
				//if (isset($_GET["idevento"]) && !isset($_POST["idevento"]))
				{
					//$query_eventos=$db->query("select id,fecha,evento from tcalendario where 1 and id='".intval($_GET["idevento"])."' limit 1");
					//if ($evento=$query_eventos->fetch_array())
					{
					?>-->
					<form action="" method="post" class="datos">
						<fieldset>
							<div><label>Por favor, confirma que quieres eliminar el evento <strong><!--<?php //echo $evento["evento"]; ?>--></strong></label></div>
							<div>
								<!--<?php //echo $evento["id"]; ?>va en el value del input hidden -->
								<input type="hidden" name="idevento" value="">
								<input type="submit" value="Eliminar Evento">
							</div>
						</fieldset>
					</form>
					<!--<?php
					}
				}
			//break;
		
		}
		?>-->
		</div>
		<script>
		$(document).ready(function()
		{
			$("form.datos").validate();
		});
		</script>
	</body>
</html>