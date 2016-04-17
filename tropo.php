<?php
	//tropo json handler
function init(){
	$arr = array();
	$arr['tropo'] = array();
}
	header('Content-Type: application/json');
	$toReturn = init();
	$toReturn['tropo'] = array();

	//ask for id
	array_push($toReturn['tropo'], array('ask' => array('say' => [array('value'=>"Hello, what is your id?")])));
	$toReturn['tropo'][0]['ask']['required'] = "true";
	$toReturn['tropo'][0]['ask']['timeout'] = 30;
	$toReturn['tropo'][0]['ask']['choices'] = array('value' => '[4 DIGITS]');
	$toReturn['tropo'][0]['ask']['name'] = "id";

	//ask for ingredient
	array_push($toReturn['tropo'], array('ask' => array('say' => [array('value'=>"What item did you buy?")])));
	$toReturn['tropo'][1]['ask']['required'] = "true";
	$toReturn['tropo'][1]['ask']['timeout'] = 30;
	$toReturn['tropo'][1]['ask']['choices'] = array('value' => 'ingredient(milk, eggs, bread, butter, flour, meat)');
	$toReturn['tropo'][1]['ask']['name'] = "ingredient";
	array_push($toReturn['tropo'], array('on' => array('event' => 'continue', 'next' => 'tropoResult.php')));
	//$toReturn['tropo']['say']['value'] = "Hello, this is a test application running on a webserver other than tropo.";
	echo json_encode($toReturn);
?>