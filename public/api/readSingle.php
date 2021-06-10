<?php 
//readSingle.php

// Adding headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing the base files
include_once('../../private/initialize.php');

//instantiate Sex file
$sex = new Sex($dbh);

$sex->sexId = isset($_GET['id']) ? ($_GET['id']) : die();
$sex->readSingle();

	$sex_arr = array(
		'sexId' => $sex->sexId,
		'longName' => $sex->longName,
		'shortName' => $sex->shortName
	);
	
	//make a json
	print_r(json_encode($sex_arr))
?>