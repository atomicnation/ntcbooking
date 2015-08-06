<?php
	session_start();
	if(isset($_SESSION)) {
		session_unset();
		session_destroy();
		header("Location:index.php?q=login");
	}
	else{
		echo "There is no session!!!";
	}
	
?>