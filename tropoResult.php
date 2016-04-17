<?php
    //tropo json handler
	function init(){
        $arr = array();
        $arr['tropo'] = array();
	}
    header('Content-Type: application/json');
    $toReturn = init();
    $toReturn['tropo'] = array();
    array_push($toReturn['tropo'], array('say' => array('value'=>"If you hear this, that means that you selected a correct answer")));
    echo json_encode($toReturn);
?>