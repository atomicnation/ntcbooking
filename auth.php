<?php
	session_start();
	include ('mysqlconn.php');
	if($_POST['email']!="" && $_POST['pwd']!=""){
		$connexion = new mySqlX();
		$pass = $_POST['pwd'];
		$query = "SELECT * FROM user WHERE usr_email ='".$_POST['email']."' AND usr_pass ='".$pass."'";
		$res = $connexion->selectDB($query);
		if($res->num_rows > 0){
			/*
			while($u = $res->fetch_assoc()){
				echo "ID: ".$u['usr_id'].", EMAIL: ".$u['usr_email'].", NAME: ".$u['usr_name'].", SURNAME: ".$u['usr_surname'].", BIRTH DATE: ".$u['usr_birth'].", PHONE: ".$u['usr_phone'].", ROLE_ID: ".$u['role_id'].", PASSWORD: ".$u['usr_pass'];
			}
			*/
			
			$_SESSION['log_in'] = 'true';
			$_SESSION['role'] = $u['role_id'];
			header("Location:index.php?q=login");
		}
		else{echo "USUARIO O PASSWORD INCORRECTOS";}
	}
	else {echo "DEBE RELLENAR TODOS LOS CAMPOS";}

?>