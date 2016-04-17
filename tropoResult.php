<?php
    //tropo json handler
	function init(){
        $arr = array();
        $arr['tropo'] = array();
	}
    $response = json_decode($_POST['actions'], true);
    $name = "sorry, name not found";
    $response = json_decode($json, true);
    $handle = fopen("tropopost.txt", "w");
    fwrite($handle, $json);
    for($i = 0; $i < count($response['actions']); $i++){
        if($response['actions'][$i]['name'] === "id"){
            $conn = new mysqli("localhost", "hackdfwuser", "9691963", "hackdfw");
            if ($conn -> connect_error) {
                die("Connection failed: " . $con -> connecterror);
            }
            $sql = "SELECT * FROM users WHERE id = " . $response['actions'][$i]['interpretation'];
            $sqlResponse = $conn -> query($sql);
            if($sqlResponse->num_rows > 0){
                $row = $sqlResponse->fetch_assoc();
                $name = $row['username'];
            }
        }
    }
    header('Content-Type: application/json');
    $toReturn = init();
    $toReturn['tropo'] = array();
    array_push($toReturn['tropo'], array('say' => array('value'=>"Welcome " . $name)));
    echo json_encode($toReturn);
?>