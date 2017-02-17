<?php
	
	function add_extension($tipo_notificacion,$rol){

		$extension = "";
		
		switch ($tipo_notificacion) {
			case 2:
				if($rol == 3){
					$extension = ".php";
				}else{
					$extension = "AdminEgdo.php";
				}
				break;
			
			case 3:
				if($rol == 3){
					$extension = ".php";
				}else{
					$extension = "_adminCurso_tee.php";
				}
			break;
			case 4:
				if($rol == 3){
					$extension = ".php";
				}else{
					$extension = "AdminCurso.php";
				}
			break;
			case 5:
				if($rol == 3){
					$extension = ".php";
				}else{
					$extension = "AdminCurso.php";
				}
			break;
			case 6:
				if($rol == 3){
					$extension = ".php";
				}else{
					$extension = "AdminCurso.php";
				}
			break;
			case 7:
				if($rol == 3){
					$extension = ".php";
				}else{
					$extension = "Admin.php";
				}
			break;
			case 8:
			$extension = ".php";
			break;
			case 9:
			$extension = ".php";
			break;
			case 12:
			$extension = ".php";
			break;
			case 13:
			$extension = ".php";
			break;
			default:
				# code...
				break;
		}
		
		return $extension;
	}

?>