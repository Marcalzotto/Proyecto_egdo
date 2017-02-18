<?php include ("../bloqueSeguridad.php");?>
<?php include("conexion.php");?>
<?php 
  include('funciones/generar_notificacion.php');
  generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('funciones/cantidad_notificaciones.php');?>
<?php include('funciones/cantidad_notificaciones_mensajes.php');?>
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
	
	<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    
    <link rel="stylesheet" href="../css/index_gral.css" />
	

    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="../css/common.css" />
    <link rel="stylesheet" type="text/css" href="../css/style-assets.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/estilos-sliderFotoEvento.css" /> 

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
      <script src="../js/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
      <script src="../js/tomarDatos.js"></script>
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

          <!-- Wide Content -->
          <h2>Galeria UPD</h2>
            
            <?php
              require_once('conexion.php');

              $curso = $_SESSION['curso'];
              $buscarFotosGaleria = "select * from imagen where id_actividad = 2 and id_curso = '$curso'";
              $ejecutarQuery = $conexion->query($buscarFotosGaleria);
              
              if($ejecutarQuery){

                  $hayFotos = $ejecutarQuery->num_rows;

                  if($hayFotos > 0){
                      while($contenido = $ejecutarQuery->fetch_array(MYSQLI_ASSOC)){
                        $cantidadImg[] = $contenido;
                      }
                   
                      echo "<section id='content' class='container'>";
                        /*<!-- SLIDESHOW -->*/
                        echo "<div id='sliders'>";
                     
                            echo "<ul class='bjqs'>";

                            foreach ($cantidadImg as $unImg) {
                              echo "<li>
                                    <img src=traerImagenesGalerias.php?id=".$unImg["id_imagen"]."  alt=''/>
                                    </li>";
                           } 
                            echo "</ul>";
                        echo"</div>";
     
                     /* <!-- FIN SLIDESHOW -->*/
                      echo "</section>";
                  }else{
                    echo "<h2>Aun no se han subido fotos para este curso</h2>";
                  }
              }else{
                echo "<h2>Hubo problemas con el servidor</h2>";
              }
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
      <script src="../js/jquery.min.js"></script>
      <script src="../js/jquery.dropotron.min.js"></script>
      <script src="../js/skel.min.js"></script>
      <script src="../js/skel-viewport.min.js"></script>
      <script src="../js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="../js/main.js"></script>
      <!-- Incluimos la libreria jQuery -->
        <script src="../js/jquery-latest.min.js"></script>
 
        <!-- Incluimos el plugin -->
        <script src="../js/bjqs.min.js"></script>
        <script src="../js/fotoEvento.js"></script>

  </body>
</html>