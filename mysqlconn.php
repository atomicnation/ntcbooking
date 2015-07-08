<?php 
class mySqlX{
	//Global variables
	public $svr = 'localhost';
	public $user = 'root';
	public $pass = '';
	public $db = 'calendar';
	public $myconn;

	public function connectDB(){
		$conn = new mysqli($this->svr , $this->user, $this->pass, $this->db);
		if($conn->connect_errno > 0){
			die('Unable to connect to database [' . $conn->connect_error . ']');
		}
		else {
			$this->myconn = $conn;
		}
	}
	
	public function insertDB($query){
		$this->connectDB();
		$conn = $this->myconn;
		if ($conn->query($query) === TRUE) {
			echo "New record created successfully";
		}
		else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}
		$conn->close();
	}
	
	public function selectDB($query){
		$this->connectDB();
		$conn = $this->myconn;
		$result = $conn->query($query);
		if($result->num_rows <= 0){
			echo "0 results";
		}
		else {
			// output data of each row
			/*print keys and values of the SELECT query
			foreach( $result as $key ){
				foreach( $key as $k=>$value ){
					echo "<b>Key:</b> $k - <b>Value:</b> $value || ";
				}
				echo "<br>";
			}
			*/
			return $result;			
		}
		$conn->close();		
	}
}

/* SELECTION EXAMPLE
$connexion = new mySqlX();
$query = "SELECT * FROM user";
$result = $connexion->selectDB($query);
foreach( $result as $key ){
	foreach( $key as $k=>$value ){
		echo "<b>Key:</b> $k - <b>Value:</b> $value || ";
	}
	echo "<br>";
}
*/

/* INSERT EXAMPLE 
$toins = array("pepe@gmail.com", "Pepe");
$connexion = new mySqlX();
$query = "INSERT INTO user (email, name) VALUES('".$toins[0]."', '".$toins[1]."')";
$connexion->insertDB($query);
*/
?>