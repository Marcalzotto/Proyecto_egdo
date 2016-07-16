<?php
$id_rol=$_SESSION['id_rol'];

	if($id_rol==2){
	
		include '../menuAdminCurso.php';
		
	}
	else{
		
		include '../menuUsuarioComun.php';
		
	}
?>		
