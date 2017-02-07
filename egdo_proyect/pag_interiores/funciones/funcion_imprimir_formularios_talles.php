<?php
function imprimir_forms_talles($conexion,$maxB, $maxR, $maxBand, $user, $curso, $fechaHoy, $fsi){
	

	if($maxB == 1 && $maxR == 1 && $maxBand == 1 && $fechaHoy > $fsi){
				$buscarTalleAnterior = "select talle_buzo, talle_remera from talles_curso where usuario = '$user'";
				$talles = $conexion->query($buscarTalleAnterior);

				if($talles){
					if($talles->num_rows > 0){
														
						$varr = $talles->fetch_array(MYSQLI_ASSOC);
						$tBuzo = $varr["talle_buzo"];
						$tRemera = $varr["talle_remera"];
						$tBuzo = strtoupper($tBuzo);
						$tRemera = strtoupper($tRemera);
					}else{
						$tBuzo = "N/D";
						$tRemera = "N/D";
					}
				}else{
					$tBuzo = "N/D";
					$tRemera = "N/D";
				}

					echo "<div id='formTalles'>	
									<h2>Eleg&iacute; tu talle de ropa</h2>
															
										<table border='1'>
											<tr>
												<th>Prenda</th>
												<th>Talle</th>
												<th>Talle elegído anteriormente</th>
											</tr>
											<tr>
												<td>Buzo</td>
												<td><select name='buzo' id='buzo'>
															<option value='null'>Seleccionar</option>
    													<option value='xs'>XS</option>
    													<option value='s'>S</option>
    													<option value='m'>M</option>
    													<option value='l'>L</option>
    													<option value='xl'>XL</option>
    													<option value='xxl'>XXL</option>
														</select>
												</td>
												<td>$tBuzo</td>
											</tr>
											<tr>
												<td>Remera</td>
    										<td><select name='remera' id='remera'>
    													<option value='null'>Seleccionar</option>
    													<option value='xs'>XS</option>
    													<option value='s'>S</option>
    													<option value='m'>M</option>
    													<option value='l'>L</option>
    													<option value='xl'>XL</option>
    													<option value='xxl'>XXL</option>
    												</select>
    										</td>
    										<td>$tRemera</td>
											</tr>
										</table>
															
								</div>";
					echo "<div id='formTallesBotones'>
									<a href='talles.php' target='_blank'>Ver tabla de talles</a><button id='btn-enviar'>Guardar Cambios</button>
								</div>";

					echo "<div id='formEliminar'>
									<h2>Eliminar Talle</h2>
											<table border='1'>
												<tr>
													<th>Buzo</th>
													<th>Remera</th>
												</tr>
												<tr>
													<td><input type='checkbox' name='prenda' value='buzo' id='p1'></td>
													<td><input type='checkbox' name='prenda' value='remera' id='p2'></td>
												</tr>
											</table>
								</div>
								<div id='formEliminarButtons'>
									<button id='btn-eliminar'>Confirmar</button><button id='btn-limpiarchk'>Limpiar</button>
								</div>";
								
					include("obtener_rol.php");
					
					$rol = get_rol($curso, $user);	
					
					if($rol == 2){			
							echo "<div id='tablaBandera'>
									<h2>Elegi la medida de la bandera</h2>
																		
																		
										<table border='1'>
											<tr>
												<th>Item</th>
												<th colspan='2'>Medida</th>
											</tr>
											<tr>
												<td rowspan='2'>Bandera</td>
												<td>Estandar(1x1,50) Consultar</td>
												<td>Otra</td>
											</tr>
											<tr>
												<td><input type='radio' value='estandar' name='medida'></td>
												<td><input type='radio' value='otra' name='medida'></td>
											</tr>
										</table>

										<button id='btn-bandera'>Enviar</button><button id='cancelar'>Limpiar</button>
								</div>";
						echo"<div id='botonesMas'><a href='armapedido.php?curso=".base64_encode($curso)."' target='_blank'>Armar Pedido</a><a href='empresasAdmin.php'>Paso Siguiente</a></div>";
				}else if($rol == 3){
					echo"<div id='botonesMas'><a href='empresas.php'>Paso Siguiente</a></div>";
				}
			}
	
}

?>