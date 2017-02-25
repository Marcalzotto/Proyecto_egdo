<?php
error_reporting(-1);
require_once("../bloqueSeguridad.php");
require_once("conexion.php");
$rol = $_SESSION["id_rol"];
function fecha ($valor)
{
	$timer = explode(" ",$valor);
	$fecha = explode("-",$timer[0]);
	$fechex = $fecha[2]."/".$fecha[1]."/".$fecha[0];
	return $fechex;
}

function buscar_en_array($fecha,$array)
{
	$total_eventos=count($array);
	for($e=0;$e<$total_eventos;$e++)
	{
		if ($array[$e]["fecha"]==$fecha) return true;
	}
}

switch ($_POST["accion"])
{
	case "listar_evento":
	{
		$query=$conexion->query("select * from tcalendario where fecha='".$_POST["fecha"]."' and curso_eventos='".$_SESSION["curso"]."' order by id asc");
		if ($fila=$query->fetch_array())
		{
			do
			{	
				if($rol == 1 || $rol == 2)
				echo "<p class='evento'>".$fila["evento"]."<a href='#' class='eliminar_evento' rel='".$fila["id"]."' title='Eliminar este Evento del ".fecha($_POST["fecha"])."'><img src='../images/calendar-img/delete.png'></a><a href='#' class='modificar_evento' rel='".$fila["id"]."' title='Modificar los datos del Evento del ".fecha($_POST["fecha"])."'><img src='../images/calendar-img/edit.png'></a><a href='#' class='ver_evento' rel='".$fila["id"]."' title='Ver datos Evento del ".fecha($_POST["fecha"])."'><img src='../images/calendar-img/binoculars.png'></a><img src='".$fila["icono"]."' alt='".$fila["tipo_evento"]."'></p>";
				else
				echo "<p class='evento'>".$fila["evento"]."<a href='#' class='ver_evento' rel='".$fila["id"]."' title='Ver datos Evento del ".fecha($_POST["fecha"])."'><img src='../images/calendar-img/binoculars.png'></a><img src='".$fila["icono"]."' alt='".$fila["tipo_evento"]."'></p>";
			}
			while($fila=$query->fetch_array());
		}
		break;
	}
	case "ver_datos_evento":
	{
		$query=$conexion->query("select * from tcalendario where id ='".$_POST["id"]."' and fecha='".$_POST["fecha"]."' ");
		if($fila = $query->fetch_array()){
			echo "<p class='datos'>Nombre: ".$fila["evento"]."</p>
			<p class='datos'>Icono: <img src=".$fila["icono"]." class='derecha' alt=".$fila["tipo_evento"]."/> (".$fila["tipo_evento"].")</p>
			<p class='datos'>Hora: ".$fila["hora"]." Hs</p>
			<p class='datos'>Barrio: ".$fila["barrio"]."</p>
			<p class='datos'>Calle: ".$fila["calle"]."</p>
			<p class='datos'>Altura: ".$fila["altura"]."</p>";
		}else{
			echo "<p class='error'>No pudimos traer los datos, porque hubo errores en el servidor.</p>";
		}
		break;
	}
	case "guardar_evento":
	{
			$curso = base64_decode($_POST["curso_evento"]);
			$arch = "";
		//$query=$conexion->query("insert into tcalendario (fecha,evento,color,icono,hora,barrio,calle,altura,curso_eventos) values ('".$_GET["fecha"]."','".strip_tags($_GET["evento"])."','".$_GET["color"]."','".$arch."','".$_GET["tiempo"]."','".$_GET["barrio"]."','".$_GET["calle"]."','".$_GET["altura"]."','".$_GET["curso"]."')");
		$query=$conexion->query("insert into tcalendario(fecha,evento,icono,hora,barrio,calle,altura,curso_eventos,tipo_evento) values ('".$_POST["evento_fecha"]."','".strip_tags($_POST["evento_titulo"])."','".$_POST["icono"]."','".$_POST["evento_hora"]."','".$_POST["evento_lugar"]."','".$_POST["calle"]."','".$_POST["altura"]."','".$curso."','".$_POST["evento_tipo"]."')");
		if ($query) echo "<p class='ok'>Evento guardado correctamente.</p>";
		else echo "<p class='error'>Se ha producido un error guardando el evento.</p>";
		break;
	}
	case "solicitar_datos":
	{
		$query=$conexion->query("select * from tcalendario where id ='".$_POST["id"]."' and fecha='".$_POST["fecha"]."' ");
		if($fila = $query->fetch_array()){
			echo "<input type='text' name='evento_titulo' id='evento_titulo' class='required' placeholder='Escribe el nombre del evento' value='".$fila["evento"]."'/><p id='field1'></p>
						<div id='div_visible'><img src='".$fila["icono"]."' alt='".$fila["tipo_evento"]."'/>".$fila["tipo_evento"]."</div><div id='lista' class='none'><li class='item'>Seleccionar icono</li><li class='item'><img src='../images/evento_icons/transport.png' alt='Transporte' />Viaje de Egresados</li><li class='item'><img src='../images/evento_icons/party.png' alt='Fiesta de egresados' />Fiesta de Egresados</li><li class='item'><img src=../images/evento_icons/upd.png alt='upd' />UPD</li><li class='item'><img src=../images/evento_icons/money.png alt='pagos' />Pagos</li><li class='item'><img src=../images/evento_icons/calendar.png alt='otros' />Otros</li></div><p id='field3'></p>	
						<label for='evento_hora'>Elegir la hora del evento</label><input type='time' name='evento_hora' id='evento_hora' class='required' value='".$fila["hora"]."' placeholder='Escribe la hora del evento'><p id='field4'></p>
						<input type='text' name='evento_lugar' id='evento_lugar' class='required' value='".$fila["barrio"]."' placeholder='Barrio'><p id='field5'></p>
						<input type='text' name='calle' id='calle' placeholder='Calle' value='".$fila["calle"]."' /><input type='number' name='altura' id='altura' value='".$fila["altura"]."' placeholder='altura' min='0' max='100000'/>
						<div class='fields67'><p id='field6'></p><p id='field7'></p></div>
						<input type='button' name='Enviar' value='Guardar' class='modificar'><input type='button' id='limpiar_form' value='limpiar'/>
						<input type='hidden' name='evento_fecha' id='evento_fecha' value='".$fila["fecha"]."' /><input type='hidden' id='curso_evento' name='curso_evento' value='".$_SESSION["curso"]."' />
						<input type='hidden' name='evento_id' id='evento_id' value='".$fila["id"]."' />
						<input type='hidden' name='accion' value='modificar_evento' />
						<input type='hidden' name='icono' id='icono' value='".$fila["icono"]."'/>
						<input type='hidden' id='evento_tipo' name='evento_tipo' value='".$fila["tipo_evento"]."'/>";

		}else{
			echo "<p class='error'>No pudimos traer los datos, porque hubo errores en el servidor.</p>";
		}
		break;
	}
	case "modificar_evento":
	{

		$query=$conexion->query("update tcalendario set evento ='".$_POST["evento_titulo"]."', icono = '".$_POST["icono"]."', hora ='".$_POST["evento_hora"]."', barrio ='".$_POST["evento_lugar"]."', calle ='".$_POST["calle"]."', altura ='".$_POST["altura"]."' where id ='".$_POST["evento_id"]."' and fecha ='".$_POST["evento_fecha"]."' ");
		//$query=$conexion->query("update tcalendario set evento ='".$_POST["evento"]."', color ='".$_POST["color"]."', hora ='".$_POST["tiempo"]."' where id ='".$_POST["id"]."' and fecha ='".$_POST["fecha"]."' ");	
		//Esta quedaria en caso que no haya que pasar archivos
		if($query) echo "<p class='ok'>Evento modificado correctamente.</p>";
		else echo "<p class='error'>Se ha producido un error guardando el evento. ".$conexion->error."</p>";
		break;
	}
	case "borrar_evento":
	{
		$query=$conexion->query("delete from tcalendario where id='".$_POST["id"]."' limit 1");
		if ($query) echo "<p class='ok'>Evento eliminado correctamente.</p>";
		else echo "<p class='error'>Se ha producido un error eliminando el evento.</p>";
		break;
	}
	case "generar_calendario":
	{
		$fecha_calendario=array();
		if ($_POST["mes"]=="" || $_POST["anio"]=="") 
		{
			$fecha_calendario[1]=intval(date("m"));
			if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
			$fecha_calendario[0]=date("Y");
		} 
		else 
		{
			$fecha_calendario[1]=intval($_POST["mes"]);
			if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
			else $fecha_calendario[1]=$fecha_calendario[1];
			$fecha_calendario[0]=$_POST["anio"];
		}
		$fecha_calendario[2]="01";
		
		/* obtenemos el dia de la semana del 1 del mes actual */
		$primeromes=date("N",mktime(0,0,0,$fecha_calendario[1],1,$fecha_calendario[0]));
			
		/* comprobamos si el año es bisiesto y creamos array de días */
		if (($fecha_calendario[0] % 4 == 0) && (($fecha_calendario[0] % 100 != 0) || ($fecha_calendario[0] % 400 == 0))) $dias=array("","31","29","31","30","31","30","31","31","30","31","30","31");
		else $dias=array("","31","28","31","30","31","30","31","31","30","31","30","31");
		
		$eventos=array();
		$query=$conexion->query("select fecha,count(id) as total from tcalendario where month(fecha)='".$fecha_calendario[1]."' and year(fecha)='".$fecha_calendario[0]."' group by fecha");
		if ($fila=$query->fetch_array())
		{
			do
			{
				$eventos[$fila["fecha"]]=$fila["total"];
			}
			while($fila=$query->fetch_array());
		}
		
		$meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		
		/* calculamos los días de la semana anterior al día 1 del mes en curso */
		$diasantes=$primeromes-1;
			
		/* los días totales de la tabla siempre serán máximo 42 (7 días x 6 filas máximo) */
		$diasdespues=42;
			
		/* calculamos las filas de la tabla */
		$tope=$dias[intval($fecha_calendario[1])]+$diasantes;
		if ($tope%7!=0) $totalfilas=intval(($tope/7)+1);
		else $totalfilas=intval(($tope/7));
			
		/* empezamos a pintar la tabla */
		echo "<h2>Calendario de Eventos para: ".$meses[intval($fecha_calendario[1])]." de ".$fecha_calendario[0]." <abbr title='S&oacute;lo se pueden agregar eventos en d&iacute;as h&aacute;biles y en fechas futuras (o la fecha actual).'>(?)</abbr></h2>";
		if (isset($mostrar)) echo $mostrar;
			
		echo "<table class='calendario' cellspacing='0' cellpadding='0'>";
			echo "<tr><th>Lunes</th><th>Martes</th><th>Mi&eacute;rcoles</th><th>Jueves</th><th>Viernes</th><th>S&aacute;bado</th><th>Domingo</th></tr><tr>";
			
			/* inicializamos filas de la tabla */
			$tr=0;
			$dia=1;
			
			function es_finde($fecha)
			{
				$cortamos=explode("-",$fecha);
				$dia=$cortamos[2];
				$mes=$cortamos[1];
				$ano=$cortamos[0];
				$fue=date("w",mktime(0,0,0,$mes,$dia,$ano));
				if (intval($fue)==0 || intval($fue)==6) return true;
				else return false;
			}
			
			for ($i=1;$i<=$diasdespues;$i++)
			{
				if ($tr<$totalfilas)
				{
					if ($i>=$primeromes && $i<=$tope) 
					{
						echo "<td class='";
						/* creamos fecha completa */
						if ($dia<10) $dia_actual="0".$dia; else $dia_actual=$dia;
						$fecha_completa=$fecha_calendario[0]."-".$fecha_calendario[1]."-".$dia_actual;
						
						if (intval($eventos[$fecha_completa])>0) 
						{
							echo "evento";
							$hayevento=$eventos[$fecha_completa];
						}
						else $hayevento=0;
						
						/* si es hoy coloreamos la celda */
						if (date("Y-m-d")==$fecha_completa) echo " hoy";
						
						echo "'>";
						
						/* recorremos el array de eventos para mostrar los eventos del día de hoy */
						if ($hayevento>0) echo "<a href='#' data-evento='#evento".$dia_actual."' class='modal' rel='".$fecha_completa."' title='Hay ".$hayevento." eventos'>".$dia."</a>";
						else echo "$dia";
						
						/* agregamos enlace a nuevo evento si la fecha no ha pasado */
						if (date("Y-m-d")<=$fecha_completa && ($rol == 1 || $rol == 2)/*&& es_finde($fecha_completa)==false*/) echo "<a href='#' data-evento='#nuevo_evento' title='Agregar un Evento el ".fecha($fecha_completa)."' class='add agregar_evento' rel='".$fecha_completa."'>&nbsp;</a>";
						 
						echo "</td>";
						$dia+=1;
					}
					else echo "<td class='desactivada'>&nbsp;</td>";
					if ($i==7 || $i==14 || $i==21 || $i==28 || $i==35 || $i==42) {echo "<tr>";$tr+=1;}
				}
			}
			echo "</table>";
			
			$mesanterior=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]-1,01,$fecha_calendario[0]));
			$messiguiente=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]+1,01,$fecha_calendario[0]));
			echo "<p class='toggle'>&laquo; <a href='#' rel='$mesanterior' class='anterior'>Mes Anterior</a> - <a href='#' class='siguiente' rel='$messiguiente'>Mes Siguiente</a> &raquo;</p>";
		break;
	}
	default:
	{
		echo "<p class='alert'>No hemos podido procesar tu peticion.</p>";
		break;
	}
}
?>