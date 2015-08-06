
<!-- COMMON INCLUDES -->
<!DOCTYPE html>
<html lang="en">
  <head>
	<!-- META CONTENT -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
   
   <!-- LINKS -->
	<link rel="icon" href="favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" /><!-- Better be included at the end -->

<!----------------------------------------------------------------------------------------------------->
	<?php if(isset($GLOBALS['cal']) && $GLOBALS['cal']): ?>
		<!-- FULLCALENDAR LINKS -->
		<link href="fullcalendar/fullcalendar.css" rel="stylesheet" />
		<link href="css/fullcalendar-ext.css" rel="stylesheet" />		
		<!-- jQuery SCRIPTS -->
		<script src="js/jquery.min.js"></script>
		<script src="fullcalendar/jquery-ui.custom.min.js"></script>
		<!-- FULLCALENDAR SRIPTS -->
		<script src="fullcalendar/moment.min.js"></script>
		<script src="fullcalendar/fullcalendar.min.js"></script>
		<script src="js/calendar.js"></script>
	<?php endif ?>
	
	
	<?php if(isset($GLOBALS['start']) && $GLOBALS['start']): ?>
		<!-- Custom styles for START PAGE -->
		<link href="css/cover.css" rel="stylesheet" />
	<?php endif ?>
	
	<?php if(isset($GLOBALS['form']) &&$GLOBALS['form']): ?>
		<!-- POPUPFORM LINKS -->
		<link href="css/form.css" rel="stylesheet" />
		<!-- POPOUP SCRIPT -->
		<script src="js/form.js" type="text/javascript"></script>
	<?php endif ?>
	<?php if(isset($GLOBALS['facilities']) &&$GLOBALS['facilities']): ?>
		<!-- Custom styles for this template -->
		<link href="css/navbar-fixed-top.css" rel="stylesheet" />
		<!-- jQuery SCRIPTS -->
		<script src="js/jquery.min.js"></script>
	<?php endif ?>
	<?php if(isset($GLOBALS['login']) &&$GLOBALS['login']): ?>
		<!-- Custom styles for this template -->
		<link href="css/navbar-fixed-top.css" rel="stylesheet" />
		<link href="css/signin.css" rel="stylesheet">
		<!-- jQuery SCRIPTS -->
		<script src="js/jquery.min.js"></script>
	<?php endif ?>
	
	<title>NTC Booking</title>
	</head>