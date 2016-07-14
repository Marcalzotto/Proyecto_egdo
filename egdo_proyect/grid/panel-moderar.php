<?php 
session_start();
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

// include db config
include_once("config.php");

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

// Database config file to be passed in phpgrid constructor
$db_conf = array( 	
					"type" 		=> PHPGRID_DBTYPE, 
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);

$g = new jqgrid($db_conf);

// $grid["url"] = ""; // your paramterized URL -- defaults to REQUEST_URI
$grid["rowNum"] = 10; // by default 20
$grid["sortname"] = 'id_comentario'; // by default sort grid by this field
$grid["sortorder"] = "asc"; // ASC or DESC
$grid["caption"] = "Moderar Comentarios"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = false; // allow you to multi-select through checkboxes

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"search" => "advance", // show single/multi field search condition (e.g. simple or advance)
						"showhidecolumns" => false
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT id_comentario, comentario, fecha_hora ,
						u.id_usuario, nombre, apellido,
						a.id_actividad, nombre_actividad
						FROM comentario c JOIN usuario u ON c.id_usuario = u.id_usuario
										JOIN actividad a ON a.id_actividad = c.id_actividad ";

// this db table will be used for add,edit,delete
$g->table = "comentario";

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id_comentario"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "10";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = false;
$cols[] = $col;

$col = array();
$col["title"] = "comentario"; // caption of column
$col["name"] = "comentario"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "40";
$col["sortable"] = false; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "select";
$col["editoptions"] = array("value"=>'Eliminado.TituloFueraLugar:Titulo fuera de lugar;Eliminado.Acumulacion Denuncia:Acumulacion Denuncia;Eliminado.No Cumple Actividad:No cumple actividad;Eliminado.Link Prohibido:Link prohibido;Eliminado. Lenguaje Inapropiado:Lenguaje inapropiado;Eliminado.Violencia Verbal:Violencia verbal;Eliminado.Otro Motivo:Otro motivo'); 
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array();
$col["title"] = "Date";
$col["name"] = "fecha_hora"; 
$col["width"] = "10";
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$col["formatter"] = "date"; // format as date
// $col["editrules"] = array("custom"=>true,"custom_func"=>"function(val,label){return my_validation(val,label);}"); 
$cols[] = $col;

$col = array();
$col["title"] = "IdUsuario";
$col["name"] = "id_usuario"; 
$col["width"] = "10";
$col["search"] = true; // this column is not searchable
$col["editable"] = false; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array();
$col["title"] = "Nombre"; // caption of column
$col["name"] = "nombre"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "15";
$col["sortable"] = false; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = false;
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;


$col = array();
$col["title"] = "Apellido"; // caption of column
$col["name"] = "apellido"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "15";
$col["sortable"] = false; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = false;
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array();
$col["title"] = "IdActividad"; // caption of column
$col["name"] = "id_actividad"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "10";
$col["sortable"] = false; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = false;
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array();
$col["title"] = "Descripcion"; // caption of column
$col["name"] = "nombre_actividad"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "10";
$col["sortable"] = false; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = false;
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;	

//$col = array();
//$col["title"] = "Client";
//$col["name"] = "name";
//$col["width"] = "100";
//$col["editable"] = false; // this column is not editable
//$col["align"] = "center"; // this column is not editable
//$col["search"] = false; // this column is not searchable
//$cols[] = $col;

//$col = array();
//$col["title"] = "Note";
//$col["name"] = "note";
//$col["sortable"] = false; // this column is not sortable
//$col["search"] = false; // this column is not searchable
//$col["editable"] = true;
//$col["editrules"] = array("required"=>true);
//$col["edittype"] = "textarea"; // render as textarea on edit
//$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes
//$cols[] = $col;

//$col = array();
//$col["title"] = "Total";
//$col["name"] = "total";
//$col["width"] = "50";
//$col["editable"] = true;
//$col["editrules"] = array("custom"=>true,"custom_func"=>"function(val,label){return my_validation(val,label);}"); 
//$col["editoptions"] = array("onblur"=>"validate_onblur(this)"); 
//$cols[] = $col;

//$col = array();
//$col["title"] = "Closed";
//$col["name"] = "closed";
//$col["width"] = "50";
//$col["editable"] = true;
//$col["edittype"] = "checkbox"; // render as checkbox
//$col["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
//$cols[] = $col;

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>EGDO::Admin</title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<link rel="stylesheet" href="panel-admin.css"> <!-- Estilo Header -->
	
	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	
	</head>
	<body>
	
	
	<script>
	function validate_onblur(o)
	{
		if (o.value < 20)
		{
			$('#FormError>td').html('Must be greater than 20'); $('#FormError').show();	
			$(o).css('borderColor','red');
			setTimeout(function(){$(o).focus()}, 10);
		}
		else
		{
			$('#FormError>td').html(''); $('#FormError').hide();	
			$(o).css('borderColor','');
		}
	}
	
	function my_validation(value,label)
	{
		if (value > 100)
			return [true,""];
		else
			return [false,label+": Should be greater than 100"];
	}
	</script>
	
	<div class="header-panel">
		<div class="div1"> 
			<ul>
				<li class="dropdown"><a href="#" class="dropbtn"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
						<div class="dropdown-content">
						<a class="list-group-item" href="../pag_interiores/panel-index.php"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Perfil</a>
						<a class="list-group-item" href="../pag_interiores/panel-mensaje.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Mensaje</a>
						</div>
				</li>
				
				<li class="dropdown"><a href="#" class="dropbtn"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a>
						<div class="dropdown-content">
						<a class="list-group-item" href="../grid/panel-empresas.php"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp; Empresa</a>
						<a class="list-group-item" href="../grid/panel-curso.php"><i class="fa fa-university" aria-hidden="true"></i>&nbsp; Curso</a>
						<a class="list-group-item" href="../grid/panel-alumno.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Alumno</a>
						<a class="list-group-item" href="../grid/panel-info.php"><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp; Info Viaje</a>
						</div>
				</li>
			</ul>
		</div> 
		<div class="div2"> 	
			<img class="egdo-logo-register" src="EGDO.png" alt="EGDO">
		</div> 
		<div class="div3">	
			<ul>	
				<li class="dropdown">
					<a href="#" class="dropbtn"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
					<div class="dropdown-content">
					<a class="list-group-item" href="../grid/panel-moderar.php"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comentarios</a>
					<a class="list-group-item" href="../pag_interiores/panel-image.php"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; Imagenes</a>
					</div>
				</li>
				<li><a class="active" href="panel-info.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></li>
			
			</ul>
		</div>								
	</div>
	
	<!--<h1 class="header-panel-h1"><img class="egdo-logo-register" src="EGDO.png" alt="EGDO"></h1> -->
	
	<h3 class="title"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comentarios</h3>
	
	<!-- GRID -->	
			<div style="margin:30px">
			<?php echo $out?>
			</div>
		
				<div id="footer-wrapper">

					<!-- Footer -->
						<div id="footer" class="container">
							<header>
								<h2>SEGUINOS EN NUESTRAS REDES SOCIALES</h2>
							</header>
							<p>Email: egdoweb@gmail.com</p>
							<ul class="contact">
								<li class="contact-li"><a href="#" class="icon  fa fa-facebook fa-lg"><span></span></a></li>
								<li class="contact-li"><a href="#" class="icon fa fa-twitter fa-lg"><span>Twitter</span></a></li>
								<li class="contact-li"><a href="#" class="icon fa fa-instagram fa-lg"><span>Instagram</span></a></li>
							</ul>
						</div>

					<!-- Copyright -->
						<div id="copyright" class="container">
							&copy; EGDO 2016.
						</div>

				</div>
	</body>
</html>