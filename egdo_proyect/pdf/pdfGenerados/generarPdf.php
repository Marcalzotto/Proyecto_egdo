<?php
	require_once('../../pag_interiores/conexion.php');
	require_once('../../bloqueSeguridad.php');
	require_once('../lib/mpdf.php');
	
	if(!isset($_GET['curso'])){
		header('location:../../index.php');
	}else{
		$curso = base64_decode($_GET["curso"]);
		
		$buscarCurso = "select id_curso from curso where id_curso = '$curso'";
		$getCurso = $conexion->query($buscarCurso);
		if($getCurso){
			if($getCurso->num_rows == 0){
				header('location:../../index.php');
			}

		}else{
			echo "Lo sentimos hubo problemas con el servidor"."</br>";

		}
	}

	$buscarDatosUsuario = "select * from usuario where id_rol = 2 and id_curso = '$curso';";
	$result = $conexion->query($buscarDatosUsuario) or die("Problemas con el servidor");
	$datosUsuario = $result->fetch_array(MYSQLI_ASSOC);
	/*obtener rol del usuario*/
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	$fechaPedido = new DateTime();
	/*fecha de emision de pedido*/
	/*<link rel="stylesheet" href="../../css/main.css" />
	<link rel="stylesheet" href="../../css/index_gral.css">*/
	$mpdf = new mPDF('c','A4');


	$pagina .= '<!DOCTYPE HTML>
						<html>
							<head>
								<title>Untitled</title>
								<meta charset="utf-8"/>
								<meta name="viewport" content="width=device-width, initial-scale=1" />
								
									
							</head>
							<body class="no-sidebar">
							<div id="page-wrapper">
								<div id="header-pedido">
									<div class="cabecera"><img src="../../favicon/android-icon-96x96.png" alt=""></div>
									<div class="cabecera">
									<ul>
										<li>Nombre Empresa</li>
										<li>Direccion, Argentina</li>
										<li>Telefono</li>
										<li>Email</li>		
									</ul>
									</div>
								</div>
							<div id="pedidos">'; 
		$pagina .= '<h1>Pedido Curso: '.$curso.'</h1>';
		$pagina .= '<ul>
									<li>'.$datosUsuario["nombre"].' '.$datosUsuario["apellido"].'</li>';
			$pagina .= '<li>Domicilio, Argenitina</li>
					 				<li>'.$datosUsuario["email"].'</li>
					 		  </ul>';
		$pagina .= '<ul>
									<li>Fecha de emision de pedido: '.$fechaPedido->format("d-m-Y").'</li>
									<li>Nombre Escuela</li>
									<li>Direccion</li>
								</ul>';
								

	$queryGanadores = "select d.path_img_doble from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 1 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;
										 select d.path_img_doble from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;
										 select d.path_frontal from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 3 and u.id_curso = $curso order by d.votos_segunda_instancia desc limit 1;";

					/*$pagina .= '<ul>';
						
						if ($conexion->multi_query($queryGanadores)) {
    						do {

        				/* almacenar primer juego de resultados */
        					/*if ($result = $conexion->store_result()) {
           					  while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                				$pagina.='<h3>'.$titulos[$i].'</h3>'.'</br>';
                				if($i == 2){
												$pagina .= '<li><img src=../../pag_interiores/Tee-Designer-master/tdesignAPI/'.$row['path_frontal'].' width=400 heigth=400 alt="img ganadora"></li>'.'</br>';
                				}else{
            						$pagina .= '<li><img src=../../pag_interiores/Tee-Designer-master/tdesignAPI/'.$row['path_img_doble'].' width=800 heigth=400 alt="img ganadora"></li>'.'</br>';
            						}
            					}
            				$result->free();
        					}
        					/* mostrar divisor */
        					/*if ($conexion->more_results()) {
            				$i++;
        					}
    						} while ($conexion->next_result());
						}

					$pagina .= '</ul>';*/


					/*$pagina .= '</br>';
					$pagina .= '</br>';
					$pagina .= '</br>';
					$pagina .= '</br>';
					$pagina .= '</br>';
					$pagina .= '</br>';
					$pagina .= '</br>';*/

			$buscartallesAlumnos = "select u.nombre, tc.talle_buzo, tc.talle_remera from usuario as u join talles_curso 
			tc on u.id_usuario = tc.usuario where u.id_curso = '$curso' and tc.talle_buzo != 'N/D' or tc.talle_remera != 'N/D';";
			
			$allTalles = $conexion->query($buscartallesAlumnos);
					if($allTalles){
						if($allTalles->num_rows > 0){
							$pagina .= '<h2>Talles de los alumnos de todo el curso</h2>';
    					$mpdf->ln();
    					$pagina.='<table cellspacing="0" class="table">
    									<tr class="tr">
    										<th class="color">Alumno</th>
    										<th class="color">Talle Buzo</th>
    										<th class="color">Talle Remera</th>
    									</tr>';
    									while($varTalles = $allTalles->fetch_array(MYSQLI_ASSOC)){
    											$vecTalles[] = $varTalles;
    									}		
    									foreach ($vecTalles as $trTalles) {
    										if($trTalles["talle_buzo"] == null && $trTalles["talle_remera"] == null){
    																		
    												$buzo = "N/D";
    												$remera = "N/D";
    									$pagina .= '<tr class="tr">
    																<td class="td">'.$trTalles['nombre'].'</td>
    																<td class="td">'.strtoupper($buzo).'</td>
    																<td class="td">'.strtoupper($remera).'</td>
    															</tr>';
    											}else{
    									$pagina .= '<tr class="tr">
    																<td class="td">'.$trTalles['nombre'].'</td>
    																<td class="td">'.strtoupper($trTalles['talle_buzo']).'</td>
    																<td class="td">'.strtoupper($trTalles['talle_remera']).'</td>
    															</tr>';
    											}		 
    									}		
    									$pagina .= '</table>';
    				}
					}

$traerTotales = "select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 's';
								 select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'm';
								 select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'l';
								 select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xl';
								 select count(talle_buzo) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xxl';
								 select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 's';
								 select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'm';
								 select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'l';
								 select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xl';
								 select count(talle_remera) as cantidad from talles_curso where curso = '$curso' and talle_buzo = 'xxl';";

								
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
								
								$mpdf->Ln();
								$mpdf->Ln();
								$mpdf->Ln();
								$mpdf->Ln();

								$pagina .= '<table cellspacing="0" class="table">
														<tr class="tr">
															<th class="color">Prenda</th>
															<th class="color">Cantidad Talle S</th>
															<th class="color">Cantidad Talle M</th>
															<th class="color">Cantidad Talle L</th>
															<th class="color">Cantidad Talle XL</th>
															<th class="color">Cantidad Talle XXL</th>
															<th class="color">Total</th>
														</tr>
														<tr class="tr">
															<td class="td">Buzo</td>
															<td class="td">'.$talles[0]['cantidad'].'</td>
															<td class="td">'.$talles[1]['cantidad'].'</td>
															<td class="td">'.$talles[2]['cantidad'].'</td>
															<td class="td">'.$talles[3]['cantidad'].'</td>
															<td class="td">'.$talles[4]['cantidad'].'</td>
															<td class="td">'.$total_buzo.'</td>
														</tr>
														<tr class="tr">
															<td class="td">Remera</td>
															<td class="td">'.$talles[5]['cantidad'].'</td>
															<td class="td">'.$talles[6]['cantidad'].'</td>
															<td class="td">'.$talles[7]['cantidad'].'</td>
															<td class="td">'.$talles[8]['cantidad'].'</td>
															<td class="td">'.$talles[9]['cantidad'].'</td>
															<td class="td">'.$total_remeras.'</td>
														</tr>
    											</table>';

    		$buscarTalleBandera = "select medida from medidas_bandera where curso = '$curso'";
    								$bandera = $conexion->query($buscarTalleBandera) or die("Problemas con el servidor");
    								$medida = $bandera->fetch_array(MYSQLI_ASSOC);
    								$medidaBandera = $medida["medida"];			
    											if($medidaBandera == ""){
    												$medidaBandera = 'N/D';
    											}
    						//$mpdf->writeHTML($pagina);
    						$mpdf->Ln();
    						$mpdf->Ln();
    						$mpdf->Ln();
								
    						$pagina .= '<h2>Medidas bandera</h2>
    											<table cellspacing="0" class="table last">
														<tr class="tr">
															<th class="color">Item</th>
															<th class="color">Medida</th>
														</tr>
														<tr class="tr">
															<td class="td">Bandera</td>
															<td class="td">'.$medidaBandera.'</td>
														</tr>
    											</table>';

    					$titulos = array(0 => "Buzo",1 => "Remera",2 => "Bandera");
							$i = 0;
    						$pagina .= '<ul class="disenios">';
									
								if ($conexion->multi_query($queryGanadores)) {
    							do {

        				/* almacenar primer juego de resultados */
        					if ($result = $conexion->store_result()){
           					  while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                				$pagina.='<li><h2>'.$titulos[$i].'</h2></li>';
                				if($i == 2){
												$pagina .= '<li><img src=../../pag_interiores/Tee-Designer-master/tdesignAPI/'.$row['path_frontal'].' width=400 heigth=400 alt="img ganadora"></li>';
                				
                				}else{
            						$pagina .= '<li><img src=../../pag_interiores/Tee-Designer-master/tdesignAPI/'.$row['path_img_doble'].' width=800 heigth=400 alt="img ganadora"></li>';
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

								$pagina .= '</ul>';
    						$pagina .= '</div></div></body></html>';


	$num = mt_rand(200,1000000);
	
	//$mpdf = new mPDF('c','A4');
	$css = file_get_contents('css/estilos_pedido.css');
	$mpdf->writeHTML($css,1);
	//$css2 = file_get_contents('../../css/index_gral.css');
	//$mpdf->writeHTML($css,2);
	$mpdf->writeHTML($pagina);
	//echo $pagina;

	$nombre = "pedidosCurso".$num.".pdf";
	$mpdf->Output($nombre,"F");

		
		$buscarSiHayPdf = "select pdf from curso_pdf where curso = '$curso'";
		$hayPdf = $conexion->query($buscarSiHayPdf) or die("Error de la consulta: ".$conexion->error); 
		
		if($hayPdf->num_rows == 1){
			
			$obtenerPdf = $hayPdf->fetch_array(MYSQLI_ASSOC);
			$borrarPdf = $obtenerPdf["pdf"];
			unlink($borrarPdf);

			$actualizar = "update curso_pdf set pdf = '$nombre' where curso = '$curso'";
			$hacerActualizacion = $conexion->query($actualizar) or die("Error al actualizar: ".$conexion->error);
			if($hacerActualizacion){
				header('location: ../../pag_interiores/votacionAdminCurso.php?grabado=1');
			}else{
				header('location: ../../pag_interiores/votacionAdminCurso.php?grabado=2');
			}
		}else{

			$insertarArch = "insert into curso_pdf values('','$nombre','$curso')";
			$conjuntoRes = $conexion->query($insertarArch);
			if($conjuntoRes){
				header('location: ../../pag_interiores/votacionAdminCurso.php?grabado=3');
			}else{
				header('location: ../../pag_interiores/votacionAdminCurso.php?grabado=4');
			}
	
		}

?>