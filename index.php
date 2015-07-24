<?php
$start; $facilities; $cal; $form;
if(!isset($_GET['q']) || $_GET['q'] == 'start'){ 
	$start = true;
}
elseif($_GET['q'] == 'cal'){
	$cal = $form = true;
	include ('fixed-nav.php');
}
elseif($_GET['q'] == 'facilities'){
	$facilities = true;
	include ('fixed-nav.php');
	include ('mysqlconn.php');
	$connexion = new mySqlX();
	$query = "SELECT * FROM item";
	$result = $connexion->selectDB($query);
	$r = array();
}

include ('headers.php'); 

?>
<body>
	<?php if(isset($cal) && $cal): ?>
	<div id="wrap">
		<div id="calendar"></div>
		<div style="clear:both"></div>

	</div>

	<!-- Form -->
	<div id="newEvForm" class="popupForm">
		<form action="savebooking.php" id="newEvF" method="post" name="form">
			<img id="close" src="img/close.png" onclick ="div_hide('newEvForm')" />
			<h2>New Booking</h2>
			<hr />
			<input id="item_id" name="item_id" type="hidden" value=""/>
			<input id="start_time" name="start_time" type="hidden" value=""/>
			<input id="end_time" name="end_time" type="hidden" value=""/>
			<input id="user_id" name="user_id" type="hidden" value=""/>
			<input id="name" name="name" placeholder="Name" type="text" />
			<p class='bg-danger'>Please introduce the name of the booker</p>
			<input id="last_name" name="last_name" placeholder="Last Name" type="text" />
			<p class='bg-danger'>Please introduce the last name of the booker</p>
			<input id="email" name="email" placeholder="Email" type="text" />
			<p class='bg-danger'>Please introduce a valid email address</p>
			<input id="phone" name="phone" placeholder="Phone Number" type="text" />
			<p class='bg-danger'>Please introduce a valid phone</p>
			<textarea id="comments" name="comments" placeholder="Comments"></textarea>
			<a href="#" id="submit" type="submit">Send</a>
		</form>
	</div>
	<!-- FORM Ends Here -->
	<!-- Form -->
	<div id="editEvForm" class="popupForm">
		<form action="savebooking.php" id="editEvF" method="post" name="form">
			<img id="close" src="img/close.png" onclick ="div_hide('editEvForm')" />
			<h2>Booking Edit</h2>
			<hr />
			<input id="item_id" name="item_id" type="hidden" value=""/>
			<input id="start_time" name="start_time" type="hidden" value=""/>
			<input id="end_time" name="end_time" type="hidden" value=""/>
			<p>Close this form if you don't want to apply this changes over the booking</p>
			<a href="javascript:%20check_form('editEvF')" onclick="div_hide('editEvForm')" id="submit2" type="submit">Send</a>
		</form>
	</div>
	<?php endif ?>
	<!-- FORM Ends Here -->
	<?php if(isset($start) && $start): ?>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">NTC Booking</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="index.php?q=start">Home</a></li>
                  <li><a href="index.php?q=facilities">Facilities</a></li>
                  <li><a href="signin.php">Login</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Cover your page.</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default">Learn more</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>&copy; 2015 Copyright by <a href="http://www.fai.ie">Football Association of Ireland</a>. All Rights Reserved</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>
	<?php endif ?>
	<?php if(isset($facilities) && $facilities): ?>
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
		
		<?php endif ?>

	<?php include 'foot-scp.php'; ?>
</body>
</html>





