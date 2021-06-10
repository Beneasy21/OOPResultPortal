<?php
//update.php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

//initializing the base files
include_once('../../private/initialize.php');

//instantiate Sex file
$sex = new Sex($dbh);

//get posted data
$data = json_decode(file_get_contents("php://input"));

$sex->sexId = $data->sexId;
$sex->longName = $data->longName;
$sex->shortName = $data->shortName;

//create Sex

if($sex->update()){
	echo json_encode(array('message' => 'Sex Updated Succesfully'));
}else{
	echo json_encode(array('message' => 'Sex Not Updated '));
}

?>