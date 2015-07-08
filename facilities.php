<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico"><!-- ############################ -->

    

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="start.php">NTC Booking System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="start.php">Home</a></li>
            <li class="active"><a href="facilities.php">Facilities</a></li>
            <li><a href="signin.php">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
		<!-- Main component for a primary marketing message or call to action -->
		<div class="row item">
			<div class="col-xs-6"><img src="img/pitch.jpg" /></div>
			<div class="col-xs-6">
				<h2>Pitch 1</h2>
				<p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
				<p>To see the difference between static and fixed top navbars, just scroll.</p>
				<p>
				  <a class="btn btn-lg btn-primary" href="#" role="button">Book it &raquo;</a>
				</p>
			</div>
		</div>	
		<!-- Main component for a primary marketing message or call to action -->
		<div class="row item">
			<div class="col-xs-6"><img src="img/pitch.jpg" /></div>
			<div class="col-xs-6">
				<h2>Pitch 2</h2>
				<p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
				<p>To see the difference between static and fixed top navbars, just scroll.</p>
				<p>
				  <a class="btn btn-lg btn-primary" href="#" role="button">Book it &raquo;</a>
				</p>
			</div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>