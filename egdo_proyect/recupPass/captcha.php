<?php

session_start();
$string = substr(md5(microtime() * mktime()),0,4);
$captcha = imagecreatefrompng("captcha.png");
$clinea = imagecolorallocate($captcha,63,63,63);
$ccolor = imagecolorallocate($captcha, 0, 0, 63);
imageline($captcha,55,0,4,40,$clinea);
imageline($captcha,0,0,35,15,$clinea);
imageline($captcha,40,0,64,24,$clinea);
imageline($captcha,0,10,70,38,$clinea);
imagestring($captcha, 10, 30, 10, $string, $ccolor);
$_SESSION['CAPTCHA'] = $string;
header("Content-type: image/png");
imagepng($captcha);


?>