<?php
include 'mysqlconn.php';

$connexion = new mySqlX();
$query = "SELECT * FROM reservation";
$result = $connexion->selectDB($query);
$count = 0;
$record = array();
while($row = mysqli_fetch_array($result)){
	/*echo $row[0]. " - ". $row[1]. " - ".$row[2];
	echo "<br>";
	*/
	if(!empty($row["start_time"]) && !empty($row["end_time"])){ // Avoid crash when no date is introduced
		$record[$count]["id"] = $row["res_id"];
		$record[$count]["title"] = "Test ".$row["res_id"]." - ".$row["name"];
		$record[$count]["start_date"] = $row["start_time"];
		$record[$count]["end_date"]=$row["end_time"];
		$count++;
	} 
}

/*
$record[0]["title"]="Test 1";
$record[1]["title"]="Test 2";
$record[2]["title"]="Test 3";

$record[0]["start_date"]="";
$record[1]["start_date"]="2015-07-11T12:00:00";
$record[2]["start_date"]="2015-07-11T12:00:00";

$record[0]["end_date"]="2015-07-11T13:00:00";
$record[1]["end_date"]="2015-07-11T13:00:00";
$record[2]["end_date"]="2015-07-11T13:00:00";

$record[0]["id"]="1";
$record[1]["id"]="2";
$record[2]["id"]="3";
*/
for ($i=0; $i<$count; $i++) {

    $event_array[] = array(
            'id' => $record[$i]['id'],
            'title' => $record[$i]['title'],
            'start' => $record[$i]['start_date'],
            'end' => $record[$i]['end_date'],
            'allDay' => false,
			'color' => "#2E8B57"
    );


}

echo json_encode($event_array);


exit;

?>