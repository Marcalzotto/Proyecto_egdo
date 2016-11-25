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
				echo"<h1>Pedido Curso: ".$curso."</h1>";
					echo "<ul>
								<li>Nombre Admin</li>
								<li>Domicilio, Argenitina</li>
								<li>Email Admin</li>
								</ul>
								<ul>
								<li>Fecha de emision de pedido: xxxx-xx-xx</li>
								<li>Nombre Escuela</li>
								<li>Direccion</li>
								</ul>";
						$queryGanadores = "select d.path_img_doble from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 1 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;select d.path_img_doble from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;select d.path_img_doble from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where 
						d.codigo_tipo = 3 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;";

						$titulos = array("Buzo", "Remera", "Bandera");
						$i = 0;
						echo "<ul>";
						if ($conexion->multi_query($queryGanadores)) {
    						do {
        				/* almacenar primer juego de resultados */
        					if ($result = $conexion->store_result()) {
           					  while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                				echo "<h3>".$titulos[$i]."</h3>"."</br>";
            						echo "<li><img src='Tee-Designer-master/tdesignAPI/$row[path_img_doble]' alt='img ganadora'></li>"."</br>";
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

										$traerTotales = "select count(id_usuario) as cantidad from usuario where id_curso = '$curso'; 
																		select count(u.id_usuario) as cantidad from usuario as u left join talles_curso tc on u.id_usuario = tc.usuario where u.id_curso = '$curso' and tc.talle_buzo is not null and tc.talle_remera is not null;
																		 select count(u.id_usuario) as cantidad from usuario as u left join talles_curso tc on u.id_usuario = tc.usuario where u.id_curso = '$curso' and tc.talle_buzo is null and tc.talle_remera is null;";
										$ind=0;					 
										if ($conexion->multi_query($traerTotales)) {
    									
    										do{
        							/* almacenar primer juego de resultados */
        									if($result = $conexion->store_result()) {
           					  			
           					  		$row = $result->fetch_array(MYSQLI_ASSOC);
                					
                					$numbers[] = $row;
            							
            								
            								$result->free();
        									}
        									/* mostrar divisor */
        									if ($conexion->more_results()) {
            								$ind++;
            								
        									}
    										}while ($conexion->next_result());
										}
										
										echo "<table>
														<tr>
															<th>Prenda</th>
															<th>Cantidad Talle S</th>
															<th>Cantidad Talle M</th>
															<th>Cantidad Talle L</th>
															<th>Cantidad Talle XL</th>
															<th>Cantidad Talle XXL</th>
															<th>Total</th>
														</tr>
														<tr>
															<td>Buzo</td>
															<td>5</td>
															<td>5</td>
															<td>5</td>
															<td>5</td>
															<td>5</td>
															<td>25</td>
														</tr>
														<tr>
															<td>Remera</td>
															<td>5</td>
															<td>5</td>
															<td>5</td>
															<td>5</td>
															<td>5</td>
															<td>25</td>
														</tr>
    											</table>";

    											echo "<h2>Medidas bandera</h2>
    											<table>
														<tr>
															<th>Item</th>
															<th>Medida</th>
														</tr>
														<tr>
															<td>Bandera</td>
															<td>Estadanar(1x1,50)</td>
														</tr>
    											</table>";

    					echo "<a href='../pdf/pdfGenerados/generarPdf.php' target='_blank' id='btn-pedido'>Generar PDF</a>
    								<a href='modeloDePedido.php' target='_blank' id='btn-modelo'>ver modelo de pedido</a>";	
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