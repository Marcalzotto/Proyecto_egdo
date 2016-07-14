You must have PostgreSQL installed for this demo. Also set database crendentials in this demo. Click on Code tab for source.
<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

/**
 * To support non-mysql databases (even mysql), see adodb lib documentation below:
 * http://phplens.com/lens/adodb/docs-adodb.htm#connect_ex
 * http://phplens.com/lens/adodb/docs-adodb.htm#drivers
 */
$db_conf = array();
$db_conf["type"] = "postgres"; // mysql,oci8(for oracle),mssql,postgres,sybase
$db_conf["server"] = "localhost";
$db_conf["user"] = "postgres";
$db_conf["password"] = "a";
$db_conf["database"] = "testdb";
		 
include("../../lib/inc/jqgrid_dist.php");
$g = new jqgrid($db_conf);
echo $g->con->ErrorMsg();

// set few params
$grid["caption"] = "Sample Grid";
$grid["rowNum"] = 5;
$g->set_options($grid);


// set database table for CRUD operations
$g->table = "clients";

$g->set_columns($cols);

// render grid
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<div style="margin:10px">
	<?php echo $out?>
	</div>
</body>
</html>