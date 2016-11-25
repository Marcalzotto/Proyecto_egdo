<?php
	require_once('../../pag_interiores/conexion.php');
	require_once('../../bloqueSeguridad.php');
	require_once('../lib/mpdf.php');
	$num = mt_rand(200,1000000);
	$css = file_get_contents('css/style.css');
	$mpdf = new mPDF('c','A4');
	$mpdf->writeHTML('css',1);
	$mpdf->writeHTML('');


	$nombre = "pedidosCurso".$num.".pdf";
	$mpdf->Output($nombre,'F');

	
	

		$insertarArch = "insert into curso_pdf values('','$archToString','$_SESSION[curso]')";
		$conjuntoRes = $conexion->query($insertarArch);
		if($conjuntoRes){
			echo "exito";
		}else{
			echo "fracaso".$conexion->error;
		}
	


?>