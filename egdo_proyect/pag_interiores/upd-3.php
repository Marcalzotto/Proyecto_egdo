<?php include ("../bloqueSeguridad.php");?>
<?php include('conexion.php');?>
<?php 
  include('funciones/generar_notificacion.php');
  generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('funciones/cantidad_notificaciones_mensajes.php');?>
<?php include('funciones/cantidad_notificaciones.php');?>
<?php include("funciones/obtener_mes.php");?>  

<?php
$fechaHoy = new DateTime();
$curso = $_SESSION["curso"];
if(isset($_GET["upd"])){
  $id_upd = $_GET["upd"];

  $exp_reg='/[^0-9]/';
  if(!preg_match($exp_reg, $id_upd)){
      $traerTodo = "select * from upd where id_upd = '$id_upd' and id_curso='$curso'";
      if($result = $conexion->query($traerTodo)){
        if($result->num_rows > 0){
          $reg = $result->fetch_array(MYSQLI_ASSOC);
        }else{
          header('location:upd-2.php');
        }
      }else{
        die("No se ha podido encontra el lugar");
      }               
    //header('location:upd-2.php');
  }else{
    header('location:upd-2.php');
  }

}else{
  header('location:upd-2.php');
}
?>

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
    
    <link rel="stylesheet" href="../css/index_gral.css" />
	
	<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />
	
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="../css/common.css" />
    <link rel="stylesheet" type="text/css" href="../css/style-assets.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/estilos-slider.css" /> 

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
      <script src="../js/calificar_upd.js"></script>
      <script src="../js/subir_comentario_upd.js"></script>
      <script src="../js/moderar_comentario_upd.js"></script>  
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
          

      
          <section class="4u 12u(mobile) info_lugar">
            <h2>Detalles del lugar</h2>
            <p class="detalles">Nombre Lugar: <?php echo $reg["nombre_lugar"]; ?></p>
            <p class="detalles">Telefono: <?php echo $reg["telefono"]; ?></p>
            <p class="detalles">Calle: <?php echo $reg["calle"]; ?></p>
            <p class="detalles">Altura: <?php echo $reg["altura"]; ?></p>
            <p class="detalles">Fue propuesto: <?php echo $reg["fecha_creacion"]; ?> hs.</p>
            <p class="detalles">Facebook: <?php if($reg["facebook"] != ""){echo $reg["facebook"];}else{echo "N/D";}?></p>
            <p class="detalles">Twitter: <?php if($reg["twitter"] != ""){echo $reg["twitter"];}else{echo "N/D";} ?></p>
            <p class="detalles">Instagram: <?php if($reg["instagram"] != ""){echo $reg["instagram"];}else{echo "N/D";} ?></p>
            <p class="detalles">Pagina web: <?php if($reg["pagina_web"] != ""){echo $reg["pagina_web"];}else{echo "N/D";} ?></p>
          </section>
          
          <!-- Wide Content -->
          <section id="content" class="container">
               <!-- SLIDESHOW -->
            <div id="sliders">
              <ul class="bjqs">
              <?php
                echo "<li>
                        <img src=../images/".$reg['foto_perfil']." alt='Imagenes de upd' title='".$reg['detalles_adicionales']."' />
                      </li>
                      <li>
                        <img src=../images/".$reg['foto_lugar']." alt='Imagenes de upd' title='".$reg['detalles_adicionales']."' />
                      </li>";
              ?>
              </ul>
            </div>
          </section>
            <?php
            $buscar_etapa_votacion = "select fecha_hora from evento where id_actividad = 2 and id_curso = '$curso'";
            if($result = $conexion->query($buscar_etapa_votacion)){
                if($result->num_rows > 0){
                  $reg = $result->fetch_array(MYSQLI_ASSOC);
                  $fecha_hora = new DateTime($reg["fecha_hora"]);
                  $interval = $fechaHoy->diff($fecha_hora);
                  $a = $interval->y;
                  $m = $interval->m;
                  $d = $interval->d;

                  $buscar_maximos = "select * from upd where id_curso = '$_SESSION[curso]' and calificacion = (
                  select max(calificacion) from upd)";
                  if($result = $conexion->query($buscar_maximos)){
                      $maximos = $result->num_rows;
                      if(($a > 0 && $maximos > 1 && $_SESSION["id_rol"] < 3) || ($m > 0 && $maximos > 1 && $_SESSION["id_rol"] < 3) || ($d >= 22 && $maximos > 1 && $_SESSION["id_rol"] < 3)){
                      echo  "<section class='4u 12u(mobile) section_votos'>
                            <p class='upd_votes'>Votar este lugar</p>
                             <form>
                              <p class='clasificacion'>
                              <input id='radio5' type='radio' name='estrellas' value='5'>
                              <label class='labelEstrellas' id='label5' for='radio5'>★</label>
                              <input id='radio4' type='radio' name='estrellas' value='4'>
                              <label class='labelEstrellas' id='label4' for='radio4'>★</label>
                              <input id='radio3' type='radio' name='estrellas' value='3'>
                              <label class='labelEstrellas' id='label3' for='radio3'>★</label>
                              <input id='radio2' type='radio' name='estrellas' value='2'>
                              <label class='labelEstrellas' id='label2' for='radio2'>★</label>
                              <input id='radio1' type='radio' name='estrellas' value='1'>
                              <label class='labelEstrellas' id='label1' for='radio1'>★</label>
                              <input type='hidden' value='$id_upd' class='hidden'>
                              </p>
                            </form>
                            <p class='valoration'></p>
                          </section>";
                      }else if($d >= 15 && $d < 22){
                          echo  "<section class='4u 12u(mobile) section_votos'>
                            <p class='upd_votes'>Votar este lugar</p>
                             <form>
                              <p class='clasificacion'>
                              <input id='radio5' type='radio' name='estrellas' value='5'>
                              <label class='labelEstrellas' id='label5' for='radio5'>★</label>
                              <input id='radio4' type='radio' name='estrellas' value='4'>
                              <label class='labelEstrellas' id='label4' for='radio4'>★</label>
                              <input id='radio3' type='radio' name='estrellas' value='3'>
                              <label class='labelEstrellas' id='label3' for='radio3'>★</label>
                              <input id='radio2' type='radio' name='estrellas' value='2'>
                              <label class='labelEstrellas' id='label2' for='radio2'>★</label>
                              <input id='radio1' type='radio' name='estrellas' value='1'>
                              <label class='labelEstrellas' id='label1' for='radio1'>★</label>
                              <input type='hidden' value='$id_upd' class='hidden'>
                              </p>
                            </form>
                            <p class='valoration'></p>
                          </section>";
                        }else{
                          echo "<section class='4u 12u(mobile)' style='margin-top:80px;'>
                                
                                </section>";
                        }
                      
                  }else{
                     echo "<section class='4u 12u(mobile)'>
                            <p>Hubo un error interno.</p>
                           </section>";
                  }

                }
            }else{
              echo "<section class='4u 12u(mobile)'>
                      <p>Hubo un error interno.</p>
                    </section>";
            }
            ?>
            
            <section class="4u 12u(mobile) section_comentario">
              <p class="upd_votes">Dejanos tu comentario.</p>
              <form id="form_upd">
                  <textarea class="charcounter-control" name="comentario_upd" id="id_comentario_upd" maxlength='1000'  warnlength='800' cols="30" rows="10"></textarea>
                  <button id="enviar_comentario_upd" data-lugar="<?php echo $id_upd; ?>">Comentar</button>
                  <input type="reset" value="Borrar"/>
              </form>
              
            </section>
            <div class="aloja_comentario">
            <?php
              $buscar_comentario = "select * from comentario_upd cu join usuario u on cu.id_usuario = u.id_usuario where cu.id_curso = '$curso' and cu.id_lugar = '$id_upd' and cu.estado_moderar = 0"; 
              if($result = $conexion->query($buscar_comentario)){
                if($result->num_rows > 0){
                   while($reg = $result->fetch_array(MYSQLI_ASSOC)){
                      $vec_comentario[] = $reg;
                   } 

                   foreach ($vec_comentario as $unComentario) {
                          $fecha_separar = explode("-", $unComentario["fecha_hora"]);
                          $aaaa = $fecha_separar[0];
                          $mm = $fecha_separar[1];
                          $dd = $fecha_separar[2];

                          $mes_nombre = get_mes($mm);

                          $tiempo = explode(" ", $dd);
                          $dia = $tiempo[0];
                          $hora = $tiempo[1];

                          $separar_hora = explode(":", $hora);
                          $horas = $separar_hora[0];
                          $minutos = $separar_hora[1];
                          $segundos = $separar_hora[2];

                          if($_SESSION["id_rol"] < 3){
                              echo "<div class='row 0%'>
                                     <div class='11u parrafo'>
                                      <p class='nombre'>".$unComentario["nombre"]."</p>
                                      <p class='contenido'>".$unComentario["comentario"]."</p>
                                      <p class='fecha'>".$dia." de ".$mes_nombre." a las ".$horas.":".$minutos." hs.</p>
                                     </div>
                                     <div class='1u img'><img src='../images/delete.png' class='del' rel=".$unComentario["id_comentario"]." alt='borrar notificacion' height='20' width='20'></div>
                                    </div>";
                            }else{
                               echo "<div class='row 0%'>
                                     <div class='12u parrafo'>
                                      <p class='nombre'>".$unComentario["nombre"]."</p>
                                      <p class='contenido'>".$unComentario["comentario"]."</p>
                                      <p class='fecha'>".$dia." de ".$mes_nombre." a las ".$horas.":".$minutos." hs.</p>
                                     </div>
                                     </div>";
                            }
                             
                   }
                 
                }else{
                  echo "<h4>Aun no se han subido comentarios sobre este lugar.</h4>";
                }
              }else{
                echo "<h4>Lo sentimos hubo error inesperado, no podras ver los comentario</h4>";
              }
            ?>
            </div>
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
      <script src="../js/script.js"></script>
      <script src="../js/jquery.charcounter.js"></script>
      <script src="../js/countDown.js"></script>
      <script src="../js/jquery-color/jquery.color.js"></script>

  </body>
</html>