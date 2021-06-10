<?php
//delete.php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

//initializing the base files
include_once('../../private/initialize.php');

//instantiate Sex file
$sex = new Sex($dbh);

//get posted data
$data = json_decode(file_get_contents("php://input"));

$sex->sexId = $data->sexId;

//create Sex
if($sex->delete()){
	echo json_encode(array('message' => 'Sex Deleted Succesfully'));
}else{
	echo json_encode(array('message' => 'Sex Not Deleted '));
}
