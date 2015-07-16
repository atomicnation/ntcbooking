<?php 

	include ('mysqlconn.php');
	$connexion = new mySqlX();
	$query = "SELECT * FROM item";
	$result = $connexion->selectDB($query);
	$r = array();
	foreach( $result as $row=>$key ){
			//echo "<b>Key:</b> $k - <b>Value:</b> $value || ";
			
		echo "	
		<div class='row item'>
			<div class='col-xs-6'><img src='".$key['item_image_url']."' /></div>
			<div class='col-xs-6'>
				<h2>".$key['item_name']."</h2>
				<p>".$key['item_description']."</p>
				<p>
				  <a class='btn btn-lg btn-primary' href='#' role='button'>Book it &raquo;</a>
				</p>
			</div>
		</div>
		";
		echo "<br>";
	}
		

	
?>