<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

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

// set few params
$grid["caption"] = "Sample Grid";
$grid["multiselect"] = true;
$grid["direction"] = "rtl";				
$g->set_options($grid);

// set database table for CRUD operations
$g->table = "clients";

$col = array();
$col["title"] = "Id";
$col["name"] = "client_id"; 
$col["width"] = "20";
$col["editable"] = true;
$cols[] = $col;	

$col = array();
$col["title"] = "Name";
$col["name"] = "name"; 
$col["editable"] = true;
$col["width"] = "80";
$cols[] = $col;	

$col = array();
$col["title"] = "Gender";
$col["name"] = "gender"; 
$col["width"] = "30";
$col["editable"] = true;
$cols[] = $col;	

$col = array();
$col["title"] = "Company";
$col["name"] = "company"; 
$col["editable"] = true;
$col["edittype"] = "textarea"; 
$col["editoptions"] = array("rows"=>2, "cols"=>20); 
$cols[] = $col;	

$g->set_columns($cols);
			
// $g->select_command = "select * from (select * from invheader) as o";
			
// render grid
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-ar.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<style>
	/* RTL CSS customizations, change 'list1' in css selector with your grid-id */
	
	.ui-jqgrid .ui-jqgrid-title {
		margin: 0.1em 0.2em;
	}
	.ui-jqgrid .ui-jqgrid-htable th div {
		text-align: right;
		padding-right: 2px;
	}	
	#list1_pager_left {
		float: right;
		width: 33%;
	}
	#list1_pager_center {
		float: right;
		white-space: pre;
		width: 33%;
	}
	#list1_pager_right {
		float: left;
		padding-left: 7px;
	}	
	.ui-jqgrid .ui-pg-table {
		float: right;
	}
	.ui-custom-icon {
		float: right;
	}
	.ui-jqgrid .ui-pager-control
	{
		padding: 5px;
	}
	</style>
	<div style="margin:10px">
	<?php echo $out?>
	</div>
</body>
</html>
