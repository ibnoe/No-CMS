<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<!-- iPhone, iPad and Android specific settings -->	
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1;">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		
		<title>Sim BBM </title>
		
		<!-- Create an icon and splash screen for iPhone and iPad -->
		<link rel="apple-touch-icon" href="<?php echo base_url();?>themes/bbm/assets/images/iOS_icon.png">
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>themes/bbm/assets/images/iOS_startup.png"> 

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/bbm/assets/css/all.css" media="screen">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/bbm/assets/css/table.css" media="screen">
		
		<!-- These stylesheets are used  -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/grocery_crud/themes/flexigrid/css/flexigrid.css" media="screen">
		
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
			
		<!-- Load JQuery -->		
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/jquery.min.js"></script>

		<!-- Load JQuery UI -->
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/jquery-ui.min.js"></script>
		
		<!-- Load Interface Plugins -->

			<script src="<?php echo base_url();?>themes/bbm/assets/js/plugins.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/fancybox/jquery.fancybox-1.3.4.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/quicksand/jquery.quicksand.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/quicksand/custom_sorter.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/quicksand/dash_sorter.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/quicksand/jquery-css-transform.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/quicksand/jquery-animate-css-rotate-scale.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/tinyeditor/tinyeditor.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/DataTables/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/jqueryFileTree/jqueryFileTree.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/slidernav/slidernav.js"></script>

		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/jquery.popupWindow.js"></script>



		<!-- This file configures the various jQuery plugins for Adminica. Contains links to help pages for each plugin. -->
		<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/adminica/adminica_ui.js"></script>


		
	</head>
		<div id="wrapper">	
			<?php include 'includes/topbar.php'?>		
			<?php include 'includes/sidebar.php'?>
			<div id="main_container" class="main_container container_16 clearfix">
					<div class="flat_area grid_16" style="min-height:600px">
					<?php echo $template['partials']['navigation_path']?>
					<?php echo $template['body'];?>
					</div>
			
		
			</div>
		</div>
<?php include 'includes/closing_items.php'?>


