<?php include ("../bloqueSeguridad.php");?>

<!DOCTYPE HTML>
<!--
  Wide Angle by Pixelarity
  pixelarity.com @pixelarity
  License: pixelarity.com/license
-->
<html lang="en" class="no-js">
  <head>
    <title>EGDO</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    
    <link rel="stylesheet" href="../assets/css/index_gral.css" />
	
	<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="../assets/css/common.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> 
                <link rel="stylesheet" type="text/css" href="../assets/css/estilos-slider.css" /> 

    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
      <link rel="manifest" href="../favicon/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      
      <!-- modal  -->
      

      <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
      <link rel="stylesheet" href="../css/styleModal.css"> <!-- Gem style -->
      <script src="../js/modernizr.js"></script> <!-- Modernizr -->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
  
  </head>
  <body class="homepage">
    <div id="page-wrapper">
    <header role="banner">
      <!-- Header Wrapper -->
        <div id="header-wrapper">

          <!-- Header -->
            
            <div id="header" class="container">
              
              
              
            <?php
			include '../pag_interiores/menu/masterMenu.php';
			?>
                
    

            </div>
        
        </div>
</header>
      <!-- Main Wrapper -->
        <div id="main-wrapper">
           <?php 
              $adminEgdo = $_SESSION['id_rol'];
              //require_once("conexion.php");
              $host_db = "localhost";
              $user_db = "root";
              $pass_db = "";
              $db_name = "egdo_db";
              

              $conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

              if ($conexion->connect_error) {
              die("La conexion falló: " . $conexion->connect_error);
              }
              
              
              
              $verificarAdmin = "select * from usuario where id_rol = '$adminEgdo'";
              $verificar = $conexion->query($verificarAdmin) or die($conexion->error);
              if($verificar){
                echo "<form class='form-validation' enctype='multipart/form-data' method='post' id='enviarimagenes'>
                  <div class='form-row'>
                    <label>Subir foto 
                    <input type='file' class='file_input' name='info_imagen' id='info_imagen' /></label>
                              </div>
                              <div class='form-row form-input-name-row'>
                    <input type='text' name='descripcion' id='descripcion' placeholder='descripcion'>
                  </div>
                            <button type='submit'>Subir imagen</button>
                  </form> ";
                }
              ?>

                <div id="mensaje"> </div>
              
              <?php
                $con = "select * from info_viaje where imagen='Cordoba'";
                if($resultado = $conexion->query($con)){
                if ($resultado ->num_rows > 0) {
                while ($datos = $resultado->fetch_array(MYSQLI_ASSOC)){
        
                  $imgBar[]= $datos;
                 }
                  
              echo "<section id='content' class='container'>";    
            echo  "<div id='sliders'>";
              echo "<ul class='bjqs'> ";
            
                  foreach($imgBar as $imgB) {
                   echo
                   "<li>
                  <img src=../img/".$imgB['nombre_lugar']." alt='Imagenes Cordoba' title='".$imgB['descripcion']."'/>
                  </li>

                   ";
                       }
echo "</ul>";
                        echo"</div>";
     
                     /* <!-- FIN SLIDESHOW -->*/
                      echo "</section>";

                     }
                   }

                 
                 ?>

          <!-- Wide Content -->
         <!--   <section id="content" class="container">
               
               <div id="sliders">
                      <ul class="bjqs">
                        <li>
                    <img src="../images/dique_sanroque2.jpg" alt="" title="El Dique San Roque es considerado uno de los más grandes del mundo, debido a la capacidad de su Embalse que puede contener 250 millones de metros cúbicos de agua, se puede acceder a él con una travesía fluvial o transitando el camino “De las cien curvas." />
                </li>
                <li>
                    <img src="../images/relojcucu_cordoba.jpg" alt="" title="El principal atractivo del reloj cucú es el pájaro de madera articulado que cada media hora sale de su cálida guarida para anunciar el paso de otra media hora. Para contemplar esta aparición es necesario seguir la Av. Uruguay y atravesar el puente que cruza el Río San Antonio." />
                </li>
                <li>
                    <img src="../images/pekos_cordoba.jpg" alt="" title="Peko’s ofrece a sus visitantes una experiencia única, que combina el disfrute y aprendizaje de la naturaleza con la emoción de las más divertidas atracciones y juegos Un lugar especialmente diseñado para brindar esparcimiento, recreación y seguridad a toda la familia." />
                </li>
            </ul>
        </div>
     
    
           </section> -->

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
                <li><a href="#" class="icon fa-facebook"><span>Facebook</span></a></li>
                <li><a href="#" class="icon fa-twitter"><span>Twitter</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span>Instagram</span></a></li>
                <!--<li><a href="#" class="icon fa-linkedin"><span>LinkedIn</span></a></li> -->
              </ul>
              
            </div>
              
          <!-- Copyright -->
            <div id="copyright" class="container">
              &copy; EGDO 2016.
            </div>

        </div>

    </div>

 <!-- Scripts -->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/jquery.dropotron.min.js"></script>
      <script src="../assets/js/skel.min.js"></script>
      <script src="../assets/js/skel-viewport.min.js"></script>
      <script src="../assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="../assets/js/main.js"></script>
      <!-- Incluimos la libreria jQuery -->
        <script src="../assets/js/jquery-latest.min.js"></script>
 
        <!-- Incluimos el plugin -->
        <script src="../assets/js/bjqs.min.js"></script>
        <script src="../assets/js/script.js"></script>

  </body>
</html>