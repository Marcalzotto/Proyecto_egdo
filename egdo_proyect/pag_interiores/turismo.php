<?php include ("../bloqueSeguridad.php");?>
<?php include('../pag_interiores/conexion.php');?>


<?php 
  include('funciones/generar_notificacion.php');
  generar_notificacion($conexion,$_SESSION["curso"]);
 ?>
 <?php include('funciones/cantidad_notificaciones_mensajes.php');?>
 <?php include('funciones/cantidad_notificaciones.php');?>



<!DOCTYPE HTML>
<!--
  Wide Angle by Pixelarity
  pixelarity.com @pixelarity
  License: pixelarity.com/license
-->
<html>
  <head>

    <title>EGDO</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="../css/index_gral.css" />
<link rel="stylesheet" href="../css/indexUser.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

    <link rel="stylesheet" type="text/css" href="../css/common.css" />
        <link rel="stylesheet" type="text/css" href="../css/style-assets.css" /> 
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
    
    <link rel="stylesheet" type="text/css" href="../css/viajes.css" />
    <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/form-viaje.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilos-slider.css" />  
        <link rel="stylesheet" type="text/css" href="../css/style.css" /> 
          <link rel="stylesheet" type="text/css" href="../css/estilosComentInfo.css" /> 
      <!--  <link rel="stylesheet" href="../admin/assets/css/mainAdmin.css" />  -->
        <link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" /> 
    <script src="../js/modernizr.js"></script> <!-- Modernizr -->
      <script src="../js/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
      <script type="text/javascript">

$(document).ready(function() {

    $("#enviar-btn").click(function() {

        var comentario = $("#comentario").val();
        var info_Id = $("#destino_info").val();
        var usu_info = $("#usu").val();
        var now = new Date();
        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();
       
       if(comentario == ""){
          alert("No ha escrito un comentario");
        }
        else {
        $.ajax({
            type: "POST",
            url: "almacenar_comentario.php",
            data: {
              destino_info: info_Id,
              usu: usu_info,
              comentario: comentario

            },

            success: function(data) {
                newText= data.split("-"); 
                $('#newComment').append('<div><div class="unComent"><p class="nombre"><a href="#">'+newText[1]+'</a></p><p>'+newText[0]+'</p><small><p class="tiempo">'+date_show+'</small></div></div>');            

              
            }

        });
        return false;
      }
  });
});

</script>

  
  
  </head>
  <body class="no-sidebar">
    <div id="page-wrapper">

      <!-- Header Wrapper -->
        <div id="header-wrapper">

          <!-- Header -->
            <div id="header" class="container">

            
             
                            
        <?php
                include '../pag_interiores/menu/masterMenu.php';
              ?>
    

            

            </div>

        </div>

      <!-- Main Wrapper  -->
      <div id="main-wrapper">

                 <?php 


        $obtUsuario = $_SESSION['id_usuario'];

                

                   $id= $_GET['id'];
                    if(filter_var($id, FILTER_VALIDATE_INT) === false){  
                      echo 'Valor incorrecto';  
                    }else{  
                      
              
           
              $con = "select * from info_viaje where id_info_viaje = $id";
                if($resultado = $conexion->query($con)){
                if ($resultado ->num_rows > 0) {
                while ($datos = $resultado->fetch_array(MYSQLI_ASSOC)){
                             $ruta_img_1 = $datos['imagen1'];
                              $ruta_img_2 = $datos['imagen2'];
                               $ruta_img_3 = $datos['imagen3'];
                               $desc2 = $datos['descripcion1'];
                               $desc3 = $datos['descripcion2'];
                               $desc4 = $datos['descripcion3'];

                                    }

                                }

                                }
                            }
                                 ?>   

 <section id='content' class='container'>   
         <div class="row"> <!-- Row Principal -->
             <section class="12u 12u">
              <div id='sliders'>
              <ul class='bjqs'> 
                     
                   <li>
                  <img src='../images/<?php echo $ruta_img_1 ?>' alt='Imagenes' title='<?php echo $desc2 ?> '>
                  </li>
                  <li>
                  <img src='../images/<?php echo $ruta_img_2 ?>' alt='Imagenes' title='<?php echo $desc3 ?> '>
                  </li>
                  <li>
                  <img src='../images/<?php echo $ruta_img_3 ?>' alt='Imagenes' title='<?php echo $desc4 ?> '>
                  </li>

             
                       </ul>
                       </div>
             </section>

  <section class="12u 12u"> <!-- formulario subida-->     
      <div id='newComment'>
            <form method='post' action=''>
                         <div class='row uniform 50%'>
               
               <div class='-2u 1u'><span>Comentarios</span></div>
                         <div class='-1u 5u$'><span><textarea id='comentario' class='form-class' name='comment' placeholder='Deja tu comentario' title='No ha escrito un cometario' required></textarea></span></div> 
                         
                         <input type='hidden' id='usu' value='<?php echo $obtUsuario ?>'>
                       <input type='hidden' id='destino_info' value='<?php echo $id?>'>
                         
                         <div class='-4u 6u$'> <input name='submit' class='button special icon fa fa-plus' type='submit' value='enviar' id='enviar-btn'/></div>
                        </div><!--/row -->
                     </form>

       </section> <!-- /formulario subida-->
        

<?php

$buscarComentarioInfo = "select usuario.nombre, comentario_infoviaje.comentario, comentario_infoviaje.fecha from usuario join comentario_infoviaje on usuario.id_usuario = comentario_infoviaje.id_usuario where comentario_infoviaje.id_info_viaje = '$id' order by comentario_infoviaje.fecha DESC";
                  $resultComent = $conexion->query($buscarComentarioInfo);
                  if($resultComent){
                    
                    if($resultComent->num_rows > 0){
                      while($com = $resultComent->fetch_array(MYSQLI_ASSOC)){
                        $comentarios[] = $com;
                      }
                      foreach ($comentarios as $tario){
                          
                  echo   "

                          <div class='unComent'>
                                                    
                              <p class='nombre'><a href='#'>".$tario['nombre']."</a></p> 
                                 <p>".$tario['comentario']."</p>  
                                  <p class='tiempo'>".$tario['fecha']."</p>
                            
                         </div> ";
                    }

                  }

                }                   
              ?>  
      </div>  
    </div>  
  </section>
   

 

      
          <?php $conexion->close(); ?>
                 
        </div> <!--main wrapper-->


      <!-- Footer Wrapper -->
        <div id="footer-wrapper">

        <!-- Footer -->
            <div id="footer" class="container">
              <header>
                <h2>SEGUINOS EN NUESTRAS REDES SOCIALES</h2>
              </header>
              <p>Email: egdoweb@gmail.com.</p>
              <ul class="contact">
                <li><a href="#" class="icon fa-facebook"><span>Facebook</span></a></li>
                <li><a href="#" class="icon fa-twitter"><span>Twitter</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span>Instagram</span></a></li>
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
        
 
        <!-- Incluimos el plugin -->
        <script src="../js/bjqs.min.js"></script>
        <script src="../js/script.js"></script>

  </body>
</html>