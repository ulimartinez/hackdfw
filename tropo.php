<?php
	//tropo json handler
function init(){
	$arr = array();
	$arr['tropo'] = array();
}
	header('Content-Type: application/json');
	$toReturn = init();
	$toReturn['tropo'] = array();
	array_push($toReturn['tropo'], array('say' => array('value'=>"Hello, this is a test application running on a webserver other than tropo.")));
	//$toReturn['tropo']['say']['value'] = "Hello, this is a test application running on a webserver other than tropo.";
	echo json_encode($toReturn);
?>