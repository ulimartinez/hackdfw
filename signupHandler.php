<?php
require_once 'php/random/lib/random.php';
	function checkEmpty($string){
        if($string == "" OR empty($string)){
            return true;
        }
        return false;
    }
    $toReturn = array();
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['confirm'];
		if(checkEmpty($username) OR checkEmpty($password) OR checkEmpty($password2)){
			$toReturn['error'] = "Must input all values";
		}
		else if($password != $password2){
			$toReturn['error'] = "Password does not match";
		}
		else{
			$salt = bin2hex(random_bytes(6));
			$password = $password . $salt;
			$password = md5($password);
			$conn = new mysqli("localhost", "root", "", "hackdfw");
            if ($conn -> connect_error) {
                die("Connection failed: " . $con -> connecterror);
            }
            $sql = "INSERT INTO users (username, password, salt) VALUES('$username', '$password', '$salt')";
            $response = $conn -> query($sql);
            $toReturn['response'] = $response;
            $toReturn['sql'] = $sql;
		}
	}
	echo json_encode($toReturn);
?>