<?php include ('head.php') ?>
    
	<!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="bootstrap-datetimepicker/bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
	
	<title>Fixed Top Navbar Example for Bootstrap</title>
  </head>

  <body>

    <?php include('fixed-nav.php'); ?>

    <div class="container">
		
		<!-- ELSE -->
		<div class="input-append date form_datetime">
			<input size="16" type="text" value="" readonly>
			<span class="add-on"><i class="icon-th"></i></span>
		</div>
		 
		<script type="text/javascript">
			$(".form_datetime").datetimepicker({
				format: "dd MM yyyy - hh:ii"
			});
		</script> 

    </div> <!-- /container -->


    <?php include 'foot-scp.php'; ?>
  

</body></html>