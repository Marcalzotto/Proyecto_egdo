<?php session_start();?>
<?php require('conexion.php'); ?>

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
      <link rel="stylesheet" type="text/css" href="../assets/css/form-viaje.css" /> 

      <script src="../js/modernizr.js"></script> <!-- Modernizr -->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
      <script>
$(function(){
            
$("#enviarimagenes").on("submit", function(evento){
  evento.preventDefault();
  var formData = new FormData(document.getElementById("enviarimagenes"));

  $.ajax({
    url: "subirImg.php",
    type: "POST",
    dataType: "HTML",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(echo){
    $("#mensaje").html(echo);
       });
     });

});
</script>

  </head>
  <body class="homepage">
    <div id="page-wrapper">
    <header role="banner">
      <!-- Header Wrapper -->
        <div id="header-wrapper">

          <!-- Header -->
            
            <div id="header" class="container">
              
              <h1 class="logo">
                  <a href="../index.html"><img src="../favicon/favicon-96x96.png" alt=""></a>
              </h1>
              
              
              
              <!-- Nav -->
                <nav id="nav">
                  
                  <ul class="myfont">
                
                  <li class="circle"><a href="left-sidebar.html"><img src="../images/upd.png" alt="UPD"></a></li>
                    
                    <li class="circle">
                      <a href="no-sidebar.html">
                        <img src="../images/shirt.png" alt="Dise&ntilde;ar">
                      </a>
                        <ul>
                          <li><a href="../simulacion_funcionalidades/Tee-Designer-Master/index.php">Dise&ntilde;a tu ropa <img src="../images/dropotron_icons/disenio_ropa.png" alt="" style="float:right"></a></li>
                          <li><a href="../simulacion_funcionalidades/votacion.php">Votaci&oacute;n<img src="../images/dropotron_icons/votacion.png" alt="" style="float:right"></a></li>
                          <li><a href="#">Empresas<img src="../images/dropotron_icons/empresas.png" alt="" style="float:right"></a></li>
                          <li><a href="../simulacion_funcionalidades/subir_arch.php">Subi tus dise&ntilde;os <img src="../images/dropotron_icons/upload.png" alt="subir archivos" style="float:right"></a></li>
                        </ul>
                      </li>
                    <li class="circle"><a href="no-sidebar.html"><img src="../images/party.png" alt="Dise&ntilde;ar"></a></li>
                    <li class="circle"><a href="no-sidebar.html"><img src="../images/foto-evento.png" alt="foto-evento"></a></li>
                    <li class="circle"><a href="infoviaje.php"><img src="../images/bus.png" alt="info-viajes"></a></li>
                    <li class="circle"><a href="no-sidebar.html">
                                        <img src="../images/settings.png" alt="configuracion">
                                      </a>
                                      <ul>
                                        <li><a href="#">Manda tu invitacion <img src="../images/dropotron_icons/send_mail.png" alt="agenda" style="float:right"></a></li>
                                        <li><a href="#">Bandeja de entrada<img src="../images/dropotron_icons/mail_box.png" alt="agenda" style="float:right"></a></li>
                                        <li><a href="#">Notificaciones<img src="../images/dropotron_icons/alarm.png" alt="agenda" style="float:right"></a></li>
                                        <li><a href="#">Agenda<img src="../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
                                        <li><a href="#">Perfil <img src="../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
                                        <li><a href="#">Logout <img src="../images/dropotron_icons/logout.png" alt="perfil" style="float:right"></a></li>
                                      </ul>


                    </li>

                    
                  </ul>
                </nav>
                
    

            </div>
        
        </div>
</header>
      <!-- Main Wrapper -->
        <div id="main-wrapper">

          <!-- Wide Content -->
             <?php 
  $admin_curso = 1;
    require_once("conexion.php");
            $verificarAdmin = "select * from usuario where id_rol = '$admin_curso'";
            
            $verificar = $conexion->query($verificarAdmin) or die($conexion->error);

                         if($verificar){
                            echo "
              
                              <form class='form-validation' enctype='multipart/form-data' method='post' id='enviarimagenes'>
                            <div class='form-row form-input-name-row'>
                            
                                <input type='text' name='nombre' id='nombre' placeholder='nombre'>
                            
                            </div>
                            
                            <div class='form-row form-input-name-row'>

                                <input type='text' name='descripcion' id='descripcion' placeholder='descripcion'>

                            </div>

                             <div class='form-row'>

                                          <label>Subir foto
         
                                            <input type='file' class='file_input' name='info_imagen' id='info_imagen' />
                                         </label>
                                      </div>
                                     
                        
                          <button type='submit'>Subir imagen</button>

                      
                              </form>
                                                      ";
            }




    ?>
          <?php
      
$con = "select * from info_viaje";
$resultado = $conexion->query($con);

while ($datos = $resultado->fetch_assoc()) {
?>
                         
                 <section id="content" class="container">
               <!-- SLIDESHOW -->
               <div id="sliders">
                      <ul class="bjqs">
                        <li>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($datos['imagen']); ?>" alt="" title="<?php echo $datos['descripcion']; ?>" />
                </li>
            </ul>
        </div>
     
                      </section>

    
<?php
};
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