<?php

include ('head.php');
include ('mysqlconn.php');
$connexion = new mySqlX();
$query = "SELECT * FROM item";
$result = $connexion->selectDB($query);
$r = array();

?>
    
	<!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>Fixed Top Navbar Example for Bootstrap</title>
  </head>

  <body>

    <?php include('fixed-nav.php'); ?>

    <div class="container">
	
		<?php foreach( $result as $row=>$key ): ?>
			<div class="row item">
				<div class="col-xs-6"><img src="<?= $key['item_image_url'] ?>" /></div>
				<div class="col-xs-6">
					<h2><?= $key['item_name'] ?></h2>
					<p><?= $key['item_description'] ?></p>
					<p>
					  <a href="index.php?q=cal" class="btn btn-lg btn-primary" href="#" role="button">Book it &raquo;</a>
					</p>
				</div>
			</div>
		<?php endforeach ?>
    <?php include 'foot-scp.php'; ?>
  

</body></html>