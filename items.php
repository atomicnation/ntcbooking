<?php 

	include ('mysqlconn.php');
	$connexion = new mySqlX();
	$query = "SELECT * FROM item";
	$result = $connexion->selectDB($query);
	foreach( $result as $key ){
		foreach( $key as $k=>$value ){
			echo "<b>Key:</b> $k - <b>Value:</b> $value || ";
		}
		echo "<br>";
	}
	
?>