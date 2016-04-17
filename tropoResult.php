<?php
    //tropo json handler
	function init(){
        $arr = array();
        $arr['tropo'] = array();
	}
    $response = json_decode($_POST['actions'], true);
    for($i = 0; $i < count($response); $i++){
        if($response[$i]['name'] === "id"){
            $conn = new mysqli("localhost", "hackdfwuser", "19691963", "hackdfw");
            if ($conn -> connect_error) {
                die("Connection failed: " . $con -> connecterror);
            }
            $sql = "SELECT * FROM users WHERE id = " . $response[$i]['interpretation'];
            $sqlResponse = $conn -> query($sql);
            $row = $sqlResponse->fetch_assoc();
            if($row->num_rows > 0){
                $name = $row['username'];
            }
            else{
                $name = "sorry, name not found";
            }
        }
    }
    header('Content-Type: application/json');
    $toReturn = init();
    $toReturn['tropo'] = array();
    array_push($toReturn['tropo'], array('say' => array('value'=>"Welcome " . $name)));
    echo json_encode($toReturn);
?>