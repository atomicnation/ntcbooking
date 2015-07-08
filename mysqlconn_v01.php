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
	
	public function insertDB($conn, $query){
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
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
			//print keys and values of the SELECT query
			foreach( $result as $key ){
				foreach( $key as $k=>$value ){
					echo "<b>Key:</b> $k - <b>Value:</b> $value || ";
				}
				echo "<br>";
			}
			
		}
	}
}

$connexion = new mySqlX();
$query = "SELECT * FROM user";
$connexion->selectDB($query);

?>