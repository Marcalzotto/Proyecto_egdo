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

			<div id="pedidos">
				<h1>Armado de pedido solicitado</h1>

				<?php 
					echo "<h2>Diseños Ganadores</h2>";
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

					$buscartallesAlumnos = "select u.nombre, tc.talle_buzo, tc.talle_remera from usuario as u left join talles_curso tc on u.id_usuario = tc.usuario where u.id_curso = '$curso';";  
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
										
										echo "<table border='1'>
    											<tr>
    												<th>Cantidad Total de alumnos</th>
    												<th>Cantidad Con Talle</th>
    												<th>Cantidad Sin Talle</th>
    											</tr>
    											<tr>	
    												<td>".$numbers[0]["cantidad"]."</td>
    												<td>".$numbers[1]["cantidad"]."</td>
    												<td>".$numbers[2]["cantidad"]."</td>
													</tr>
    											</table>";

    					echo "<a href='../pdf/pdfGenerados/generarPdf.php' target='_blank' id='btn-pedido'>Generar PDF</a>";	
    					$conexion->close();
				?>

			</div>

			<!-- Footer Wrapper -->
				<div id="footer-wrapper">

					<!-- Footer -->
						<div id="footer" class="container">
							<header>
								<h2>SEGUINOS EN NUESTRAS REDES SOCIALES</h2>
							</header>
							<p>Email: egdoweb@gmail.com</p>
							<ul class="contact">
								<li><a href="#" class="icon fa-instagram"><span>Instagram</span></a></li>
								<li><a href="#" class="icon fa-facebook"><span>Facebook</span></a></li>
								<li><a href="#" class="icon fa-twitter"><span>Twitter</span></a></li>
							</ul>
						</div>

					<!-- Copyright -->
						<div id="copyright" class="container">
							&copy; EGDO 2016.
						</div>

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