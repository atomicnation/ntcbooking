<?php session_start();

	include 'mysqlconn.php'; 
	//echo "DATE PICKED: ".$_SESSION['datepicked'];
	if(!empty($_POST)) {
		$toins = array($_POST['item_id'], $_POST['start_time'], $_POST['end_time'], $_POST['name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['comments']  );
		$connexion = new mySqlX();
		//Check if there is another reservation for this period of time
		/*
		$query = "SELECT * FROM reservation WHERE item_id=".$_POST['item_id']." AND start_time=".$_POST['start_time']." BETWEEN start_time AND end_time";
		$result = $connexion->selectDB($query);
		if(!empty($result)){
			echo "There is a reservation already for this time";
		}
		*/
		$query = "INSERT INTO reservation (item_id, start_time, end_time, name, last_name, email, phone, comments)
			VALUES('".$toins[0]."', '".$toins[1]."', '".$toins[2]."', '".$toins[3]."', '".$toins[4]."', '".$toins[5]."', '".$toins[6]."', '".$toins[7]."')";
		$connexion->insertDB($query);
	}
?>