<?php
$id_rol=$_SESSION['id_rol'];

	if($id_rol==2){
	
		include '../pag_interiores/menu/menuAdminCurso.php';
		
	}
	else{
		
		include '../pag_interiores/menu/menuUsuarioComun.php';
		
	}
?>		