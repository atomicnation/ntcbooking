<?php 
	session_start();
	$l;$lgn;
	
	if(isset($_SESSION["log_in"]) && $_SESSION["log_in"] == 'true'){
		$l = "Log Out";
		$lgn = "logout.php";
	}
	else{
		$l = "Log In";
		$lgn = "index.php?q=login";	
	}
	
 ?>
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
          <a class="navbar-brand" href="index.php">NTC Booking System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="index.php?q=facilities">Facilities</a></li>
            <li><a href="<?php echo $lgn ?>"><?php echo $l ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>