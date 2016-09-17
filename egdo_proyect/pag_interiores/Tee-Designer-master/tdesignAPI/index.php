<?php

$numero = $_POST['num'];
$letra = $_POST['letra'];

if($numero != ""){
	echo "hay numero";
}else{
	echo "no hay";
}

/*$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$im = imagecreatefromstring($data);  //convertir text a imagen
if ($im !== false) {
    imagejpeg($im, '../images/nombre_imagen.jpg'); //guardar a server 
    imagedestroy($im); //liberar memoria  
    echo 'Todo salio bien tu imagen ha sido guardada';
}else {
    echo 'Un error ocurrio al convertir la imagen.';    
}*/

?>