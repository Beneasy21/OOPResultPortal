<?php 
	// Adding headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Accept: application/json');

//initializing the base files
include_once('../../private/initialize.php');

//instantiate Sex file
$sex = new Sex($dbh);

$result = $sex->read();

//get rowCount
$num = $result->rowCount();

if($num > 0){
	$sex_arr = array();
	$sex_arr["data"] = array();

	while($row = $result->fetch()){
		extract($row);
		$sex_item = array( 
			'sexId' => $sexId,
			'longName' => $longName,
			'shortName' => $shortName
		);
		array_push($sex_arr["data"], $sex_item);
	}
	//convert to json and output
	echo json_encode($sex_arr);
}else{
	echo json_encode(array('message'=>'No post Found'));
}

?>