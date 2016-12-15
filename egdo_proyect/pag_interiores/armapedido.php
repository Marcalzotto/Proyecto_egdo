<?php
	require_once("../bloqueSeguridad.php");
	require_once("conexion.php");
	
	if(!isset($_GET['curso'])){
		header('location:../index.php');
	}else{
		$curso = base64_decode($_GET["curso"]);
		
		$buscarCurso = "select id_curso from curso where id_curso = '$curso'";
		$getCurso = $conexion->query($buscarCurso);
		if($getCurso){
			if($getCurso->num_rows == 0){
				header('location:../index.php');
			}

		}else{
			echo "Lo sentimos hubo problemas con el servidor"."</br>";

		}
	}
	
?>
<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<?php
	$buscarDatosUsuario = "select * from usuario where id_rol = 2 and id_curso = '$curso';";
	$result = $conexion->query($buscarDatosUsuario) or die("Problemas con el servidor");
	$datosUsuario = $result->fetch_array(MYSQLI_ASSOC);

?>
<html>
	<head>
		<title>Untitled</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/main.css" />
		<link rel="stylesheet" href="../css/index_gral.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">
		<div id="header-pedido">
			<div class="cabecera"><img src="../favicon/android-icon-96x96.png" alt=""></div>
			<div class="cabecera">
				<ul>
					<li>Nombre Empresa</li>
					<li>Direccion, Argentina</li>
					<li>Telefono</li>
					<li>Email</li>		
				</ul>
			</div>
		</div>
			<div id="pedidos">
				<?php 
				date_default_timezone_set('America/Argentina/Buenos_Aires');

				$fechaPedido = new DateTime();
				$fechaPedido->format("dd-mm-yy");
				echo"<h1>Pedido Curso: ".$curso."</h1>";
					echo "<ul>
								<li>".$datosUsuario["nombre"]." ".$datosUsuario["apellido"]."</li>
								<li>Domicilio, Argenitina</li>
								<li>".$datosUsuario["email"]."</li>
								</ul>
								<ul>
								<li>Fecha de emision de pedido: ".$fechaPedido->format("d-m-Y")."</li>
								<li>Nombre Escuela</li>
								<li>Direccion</li>
								</ul>";
						$queryGanadores = "select d.path_img_doble from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 1 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;select d.path_img_doble from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;select d.path_frontal from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where 
						d.codigo_tipo = 3 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;";
						echo "</br></br></br></br></br>";
						$titulos = array("Buzo", "Remera", "Bandera");
						$i = 0;
						echo "<ul>";
						if ($conexion->multi_query($queryGanadores)) {
    						do {
        				/* almacenar primer juego de resultados */
        					if ($result = $conexion->store_result()) {
           					  while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                				echo "<h3>".$titulos[$i]."</h3>"."</br>";
                				if($i == 2){
												echo "<li><img src='Tee-Designer-master/tdesignAPI/$row[path_frontal]' alt='img ganadora'></li>"."</br>";
                				}else{
            						echo "<li><img src='Tee-Designer-master/tdesignAPI/$row[path_img_doble]' alt='img ganadora'></li>"."</br>";
            						}
            					}
            				$result->free();
        					}
        					/* mostrar divisor */
        					if ($conexion->more_results()) {
            				$i++;
        					}
    						} while ($conexion->next_result());
						}

					echo "</ul>";

					/*$buscartallesAlumnos = "select u.nombre, tc.talle_buzo, tc.talle_remera from usuario as u left join talles_curso tc on u.id_usuario = tc.usuario where u.id_curso = '$curso';";*/
					
					$buscartallesAlumnos = "select u.nombre, tc.talle_buzo, tc.talle_remera from usuario as u join talles_curso tc on u.id_usuario = tc.usuario where u.id_curso = '$curso' and tc.talle_buzo != 'N/D' or tc.talle_remera != 'N/D';";

					$allTalles = $conexion->query($buscartallesAlumnos);
					if($allTalles){
						if($allTalles->num_rows > 0){
							echo "<h2>Talles de los alumnos de todo el curso</h2>
    								<table border='1'>
    									<tr>
    										<th>Alumno</th>
    										<th>Talle Buzo</th>
    										<th>Talle Remera</th>
    									</tr>";
    									while($varTalles = $allTalles->fetch_array(MYSQLI_ASSOC)){
    											$vecTalles[] = $varTalles;
    									}		
    									foreach ($vecTalles as $trTalles) {
    										if($trTalles["talle_buzo"] == null && $trTalles["talle_remera"] == null){
    																		
    												$buzo = "N/D";
    												$remera = "N/D";
    												echo"<tr>
    														<td>".$trTalles["nombre"]."</td>
    														<td>".strtoupper($buzo)."</td>
    														<td>".strtoupper($remera)."</td>
    														</tr>";
    											}else{
    												echo"<tr>
    															<td>".$trTalles["nombre"]."</td>
    															<td>".strtoupper($trTalles["talle_buzo"])."</td>
    															<td>".strtoupper($trTalles["talle_remera"])."</td>
    															</tr>";
    											}		 
    									}		
    																	
    									echo "</table>";
    									
    				}
					}

$traerTotales = "select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 's';select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'm';select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'l';select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xl';select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xxl';select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 's';select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'm';select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'l';select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xl';select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xxl';";								 
										
										$ind=0;					 
										if ($conexion->multi_query($traerTotales)) {
													   										
    										do{
        							/* almacenar primer juego de resultados */
        									if($result = $conexion->store_result()) {
           					  			
           					  		$row = $result->fetch_array(MYSQLI_ASSOC);
                					
                					$talles[] = $row;
            							
            								
            								$result->free();
        									}
        									/* mostrar divisor */
        									if ($conexion->more_results()) {
            								$ind++;
            								
        									}
    										}while ($conexion->next_result());
										}


		$total_buzo = 0;
		$total_remeras = 0;		
		$total_buzo = $total_buzo + $talles[0]['cantidad'] + $talles[1]['cantidad'] + $talles[2]['cantidad'] + $talles[3]['cantidad'] + $talles[4]['cantidad'];
		$total_remeras = $total_remeras +	$talles[5]['cantidad'] + $talles[6]['cantidad'] + $talles[7]['cantidad'] + $talles[8]['cantidad'] + $talles[9]['cantidad']; 									
													
													echo "<table>
														<tr>
															<th>Prenda</th>
															<th>Cantidad Talle S</th>
															<th>Cantidad Talle M</th>
															<th>Cantidad Talle L</th>
															<th>Cantidad Talle XL</th>
															<th>Cantidad Talle XXL</th>
															<th>Total</th>
														</tr>";
													echo"<tr>
															<td>Buzo</td>
															<td>".$talles[0]['cantidad']."</td>
															<td>".$talles[1]['cantidad']."</td>
															<td>".$talles[2]['cantidad']."</td>
															<td>".$talles[3]['cantidad']."</td>
															<td>".$talles[4]['cantidad']."</td>
															<td>".$total_buzo."</td>
														</tr>
														<tr>
															<td>Remera</td>
															<td>".$talles[5]['cantidad']."</td>
															<td>".$talles[6]['cantidad']."</td>
															<td>".$talles[7]['cantidad']."</td>
															<td>".$talles[8]['cantidad']."</td>
															<td>".$talles[9]['cantidad']."</td>
															<td>".$total_remeras."</td>
														</tr>
    											</table>";
    								
    								$buscarTalleBandera = "select medida from medidas_bandera where curso = '$curso'";
    								$bandera = $conexion->query($buscarTalleBandera) or die("Problemas con el servidor");
    								$medida = $bandera->fetch_array(MYSQLI_ASSOC);
    								$medidaBandera = $medida["medida"];			
    											if($medidaBandera == ""){
    												$medidaBandera = 'N/D';
    											}
    											echo "<h2>Medidas bandera</h2>
    											<table>
														<tr>
															<th>Item</th>
															<th>Medida</th>
														</tr>
														<tr>
															<td>Bandera</td>
															<td>".$medidaBandera."</td>
														</tr>
    											</table>";

    					echo "<a href='../pdf/pdfGenerados/generarPdf.php?curso=".base64_encode($curso)."' target='_blank' id='btn-pedido'>Generar PDF</a>
    								<a href='../pdf/pdfGenerados/pruebaPdf.php?curso=".base64_encode($curso)."' target='_blank' id='btn-modelo'>ver modelo de pedido</a>";	
    					$conexion->close();
				?>

			</div>
</div>

		<!-- Scripts -->
			<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.dropotron.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="vjs/skel-viewport.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>

	</body>
</html>