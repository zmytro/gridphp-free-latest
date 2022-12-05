<?php
session_start();
if (!isset($_SESSION['users_test']) && !isset($_SESSION['users_test_admin'])) {
    header('Location: index.php');
}
if (!isset($_SESSION['users_test_admin']) && isset($_SESSION['users_test'])) {
    header('Location: usr_page.php');
}
include_once("config.php");

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

$grid["rowNum"] = 5; // by default 20
$grid["sortname"] = 'employee_id'; // by default sort grid by this field
$grid["caption"] = "Список работников офиса"; // caption of grid
$grid["autowidth"] = false; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["subGrid"] = false;
$grid["subgridurl"] = "google.com";
$grid["loadComplete"] = "function(){ var rowid=2; 
	jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').html(''); 
	jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').unbind(); 
	 }"; 
$grid["subgridparams"] = "employee_id,first_name,last_name,room,department"; // no spaces b/w column names

//$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");

$g->set_options($grid);


$g->set_actions(array(	
	"add"=>true, // allow/disallow add
	"edit"=>true, // allow/disallow edit
	"delete"=>true, // allow/disallow delete
	"rowactions"=>true, // show/hide row wise edit/del/save option
	"export"=>true, // show/hide export to excel option
	"autofilter" => true, // show/hide autofilter for search
	"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
) 
);
// you can provide custom SQL query to display data


$g->table = "employees";

$col = array();
$col["title"] = "ID"; // caption of column
$col["name"] = "employee_id";
$col["editable"] = false;
 // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols[] = $col;	

$col = array();
$col["title"] = "Имя"; // caption of column
$col["name"] = "first_name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols[] = $col;	

$col = array();
$col["title"] = "Фамилия"; // caption of column
$col["name"] = "last_name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols[] = $col;	

$col = array();
$col["title"] = "Кабинет"; // caption of column
$col["name"] = "room"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols[] = $col;	

$col = array();
$col["title"] = "Департамент"; // caption of column
$col["name"] = "department"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols[] = $col;	



$g->set_columns($cols,true);
$out = $g->render("list");


//----------------------------------------------------------------------

$g = new jqgrid($db_conf);

$grid["rowNum"] = 6; // by default 20
$grid["sortname"] = 'emp_id'; // by default sort grid by this field
$grid["caption"] = "Список компьютеров"; // caption of grid
$grid["autowidth"] = false; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["subGrid"] = false;
$grid["responsive"] = true;
$grid["subgridurl"] = "google.com";
$grid["loadComplete"] = "function(){ var rowid=2; 
	jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').html(''); 
	jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').unbind(); 
	 }"; 
//$grid["subgridparams"] = "employee_id,first_name,last_name,room,department"; // no spaces b/w column names

//$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");

$g->set_options($grid);


$g->set_actions(array(	
	"add"=>true, // allow/disallow add
	"edit"=>true, // allow/disallow edit
	"delete"=>true, // allow/disallow delete
	"rowactions"=>true, // show/hide row wise edit/del/save option
	"export"=>true, // show/hide export to excel option
	"autofilter" => true, // show/hide autofilter for search
	"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
) 
);
// you can provide custom SQL query to display data


$g->table = "employees_pc";

$col2 = array();
$col2["title"] = "PC ID"; // caption of column
$col2["name"] = "pc_id";
$col2["editable"] = false;
 // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols2[] = $col2;	

$col2 = array();
$col2["title"] = "PC NAME"; // caption of column
$col2["name"] = "pc_name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols2[] = $col2;	

$col2 = array();
$col2["title"] = "Core"; // caption of column
$col2["name"] = "core"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols2[] = $col2;	

$col2 = array();
$col2["title"] = "HDD SIZE"; // caption of column
$col2["name"] = "hdd_size"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols2[] = $col2;	

$col2 = array();
$col2["title"] = "RAM SIZE"; // caption of column
$col2["name"] = "ram_size"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols2[] = $col2;	

$col2 = array();
$col2["title"] = "EMP ID"; // caption of column
$col2["name"] = "emp_id";
$col2["editable"] = true; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$cols2[] = $col2;	



$g->set_columns($cols2,true);
$out2 = $g->render("list2");

//----------------------------------------------------------------------

$g = new jqgrid($db_conf);

$grid["rowNum"] = 6; // by default 20
$grid["sortname"] = 'emp_id'; // by default sort grid by this field
$grid["caption"] = "Список работников и их компьютеров"; // caption of grid
$grid["autowidth"] = false; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["subGrid"] = false;
$grid["subgridurl"] = "google.com";
$grid["loadComplete"] = "function(){ var rowid=2; 
	jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').html(''); 
	jQuery('tr#'+rowid+' td[aria-describedby$=subgrid]').unbind(); 
	 }"; 
//$grid["subgridparams"] = "employee_id,first_name,last_name,room,department"; // no spaces b/w column names

//$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");

$g->set_options($grid);


$g->set_actions(array(	
	"add"=>true, // allow/disallow add
	"edit"=>true, // allow/disallow edit
	"delete"=>true, // allow/disallow delete
	"rowactions"=>true, // show/hide row wise edit/del/save option
	"export"=>true, // show/hide export to excel option
	"autofilter" => true, // show/hide autofilter for search
	"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
) 
);
// you can provide custom SQL query to display data


$g->select_command = "SELECT * FROM employees e JOIN employees_pc pc ON e.employee_id = pc.emp_id";
$Col3 = array();
$Col3["title"] = "EMP ID"; // caption of column
$Col3["name"] = "emp_id";
$Col3["editable"] = true;
$Col3["visible"] = false; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "EMP ID"; // caption of column
$Col3["name"] = "employee_id";
$Col3["editable"] = false;
$Col3["visible"] = true;

 // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;

$Col3 = array();
$Col3["title"] = "PC ID"; // caption of column
$Col3["name"] = "pc_id";
$Col3["editable"] = false;
 // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "Имя"; // caption of column
$Col3["name"] = "first_name";
 // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "Фамилия"; // caption of column
$Col3["name"] = "last_name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "Room"; // caption of column
$Col3["name"] = "room";
$Col3["visible"] = false; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "Dept"; // caption of column
$Col3["name"] = "department";
$Col3["visible"] = false; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;


$Col3 = array();
$Col3["title"] = "PC NAME"; // caption of column
$Col3["name"] = "pc_name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "Core"; // caption of column
$Col3["name"] = "core"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "HDD SIZE"; // caption of column
$Col3["name"] = "hdd_size"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	

$Col3 = array();
$Col3["title"] = "RAM SIZE"; // caption of column
$Col3["name"] = "ram_size"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$Cols3[] = $Col3;	





$g->set_columns($Cols3,true);
$out3 = $g->render("list3");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/Blitzer/jquery-ui.custom.css"></link>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>
	<link rel="stylesheet" href="vendor/style2.css" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Yanone+Kaffeesatz&display=swap"
        rel="stylesheet" />

	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>

	<!-- library for persistance storage -->
	<link rel="stylesheet" type="text/css" media="screen" href="//cdn.jsdelivr.net/gh/tamble/jquery-ui-daterangepicker@0.5.0/jquery.comiseo.daterangepicker.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" type="text/javascript"></script>
	<script src="//cdn.jsdelivr.net/gh/tamble/jquery-ui-daterangepicker@0.5.0/jquery.comiseo.daterangepicker.min.js" type="text/javascript"></script>

	<!-- used inside subgrid detail but inclusion required in parent file, not in subgrid detail -->
	<!--
	<script src="//cdn.jsdelivr.net/jstorage/0.1/jstorage.min.js" type="text/javascript"></script>	
	<script src="//cdn.jsdelivr.net/json2/0.1/json2.min.js" type="text/javascript"></script>
	<script src="//cdn.jsdelivr.net/gh/gridphp/jqGridState@master/jqGrid.state.js" type="text/javascript"></script>

	<script>
	var opts_list1 = {
		"stateOptions": {         
					storageKey: "gridState-list-parentgrid",
					columns: true, // remember column chooser settings
					selection: true, // row selection
					expansion: true, // subgrid expansion
					filters: true, // subgrid expansion
					pager: true, // page number
					order: true // field ordering
		}
	};
	</script>
	-->
</head>
<body>
<header>
        <div class="wrap-logo">
            <p class="header-p">ADMIN PANEL</p>
        </div>
        
        <nav>
            <input type="button" class="reg2" value="Logout" onclick="location.href='vendor/logout.php'"></input>
        </nav>
    </header>
	<div style="margin:10px">
	<?php echo $out3?>
	<br>
	<?php echo $out2?>
	<br>
	<?php echo $out?>
	</div>

	<script type="text/javascript">
	
	function expand_all()
	{
		var rowIds = jQuery("#list1").getDataIDs();
		jQuery.each(rowIds, function (index, rowId) { jQuery("#list1").expandSubGridRow(rowId); });
	}
	
	setTimeout(()=>{
		jQuery(document).ready(function(){
			jQuery('#list1').jqGrid('navButtonAdd', '#list1_pager',
			{
				'caption'      : 'Toggle Expand',
				'buttonicon'   : 'ui-icon-plus',
				'onClickButton': function()
				{

					var rowIds = jQuery("#list1").getDataIDs();

					if ( ! jQuery(document).data('expandall') )
					{
						jQuery.each(rowIds, function (index, rowId) { jQuery("#list1").expandSubGridRow(rowId); });
						jQuery(document).data('expandall',1);
					}
					else
					{
						jQuery.each(rowIds, function (index, rowId) { jQuery("#list1").collapseSubGridRow(rowId); });
						jQuery(document).data('expandall',0);
					}

				},
				'position': 'last'
			});
		});
	},200)
	</script>

</body>
</html>