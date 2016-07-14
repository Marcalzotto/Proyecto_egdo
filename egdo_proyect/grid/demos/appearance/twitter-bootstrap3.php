<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

 //http://www.ok-soft-gmbh.com/jqGrid/FontAwesome4_Bootstrap3_.htm
 //http://www.ok-soft-gmbh.com/jqGrid/FontAwesome4_.htm
 
// include db config
include_once("../../config.php");

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

// set table for CRUD operations
$g->table = "clients";
	
$grid["caption"] = "Bootstrap3 UI Testing";
$grid["autowidth"] = true;
$grid["toolbar"] = "bottom";
$grid["autoresize"] = true; // responsive effect
$grid["view_options"]['width']='520';

// required for iphone/safari scroll display
// $grid["height"] = "auto";

$g->set_options($grid);

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "client_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "30";
$cols[] = $col;

$col = array();
$col["title"] = "Name"; // caption of column
$col["name"] = "name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["required"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Gender"; // caption of column
$col["name"] = "gender"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Company"; // caption of column
$col["name"] = "company"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["editoptions"] = array("defaultValue" => "Default Company");
$cols[] = $col;

$g->set_columns($cols);

$g->set_actions(array(
		"add"=>true, // allow/disallow add
		"edit"=>true, // allow/disallow edit
		"delete"=>true, // allow/disallow delete
		"clone"=>true, // allow/disallow delete
		"rowactions"=>true, // show/hide row wise edit/del/save option
		"search" => "advance", // show single/multi field search condition (e.g. simple or advance)
		"showhidecolumns" => false
)
);
// render grid
$out = $g->render("list1");


$themes = array("black-tie","blitzer","cupertino","dark-hive","dot-luv","eggplant","excite-bike","flick","hot-sneaks","humanity","le-frog","mint-choc","overcast","pepper-grinder","redmond","smoothness","south-street","start","sunny","swanky-purse","trontastic","ui-darkness","ui-lightness","vader");
$i = rand(0,8);

// if set from page
if (is_numeric($_GET["themeid"]))
	$i = $_GET["themeid"];
else
	$i = 14;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Grid Control Demos | www.phpgrid.org</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/<?php echo $themes[$i] ?>/jquery-ui.custom.css">

	<!-- bootstrap3 + jqgrid compatibility css -->
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.bs.css">	
	<link href="../../bootstrap/css/bootstrap3.min.css" rel="stylesheet">
	
	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
  </head>

  <body>
	<div style="margin:10px">
			<form method="get">
			Choose Theme: <select name="themeid" onchange="form.submit()">
				<?php foreach($themes as $k=>$t) { ?>
					<option value=<?php echo $k?> <?php echo ($i==$k)?"selected":""?>><?php echo ucwords($t)?></option>
				<?php } ?>
			</select> - 
			You can also have your customized theme (<a href="http://jqueryui.com/themeroller">jqueryui.com/themeroller</a>).
			</form>
			<br>
			<?php echo $out?>
			
			<style>
			@media only screen and (max-width:767px) and (-webkit-min-device-pixel-ratio:0) {
				.ui-jqgrid .ui-jqgrid-pager>.ui-pager-control>.ui-pg-table>tbody>tr>td#list1_pager_center>.ui-pg-table {
					width:300px
				}
			}
			@media only screen and (max-width:767px) {
				.ui-jqgrid .ui-jqgrid-pager {
					height:90px
				}
				.ui-jqgrid .ui-jqgrid-pager>.ui-pager-control {
					height:85px;
					padding-top:9px
				}
				.ui-jqgrid .ui-jqgrid-pager>.ui-pager-control>.ui-pg-table>tbody>tr>td {
					vertical-align:top
				}
				.ui-jqgrid .ui-jqgrid-pager>.ui-pager-control>.ui-pg-table>tbody>tr>td#list1_pager_center {
					width:0!important;
					position:static;
				}
				.ui-jqgrid .ui-jqgrid-pager>.ui-pager-control>.ui-pg-table>tbody>tr>td#list1_pager_center>.ui-pg-table {
					margin:36px auto 0;
					position:absolute;
					right:0;
					left:0;
					text-align: center;
				}
			}	
			</style>
	</div>
  </body>
</html>
