<?php
    session_start();
    header('Content-Type: application/json');
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
        if(checkEmpty($username) OR checkEmpty($password)){
            $toReturn['error'] = "Must input both values";
        }
        else {
            $conn = new mysqli("localhost", "root", "", "hackdfw");
            if ($conn -> connect_error) {
                die("Connection failed: " . $con -> connecterror);
            }
            $sql = "SELECT * FROM users WHERE username = '" . $username . "'";
            $response = $conn -> query($sql);
            if($response -> num_rows > 0){
                $row = $response->fetch_assoc();
                $salt = $row['salt'];
                $password = $password . $salt;
                $hash = md5($password);
                if($hash === $row['password']){
                    $toReturn['login'] = true;
                    $toReturn['username'] = $row['username'];
                    $_SESSION['logged'] = "in";
                    $_SESSION['user'] = $username;
                    $_SESSION['id'] = $row['id'];
                }
                else{
                    $toReturn['error'] = "Username or password incorrect";
                }
            }
            else{
                $toReturn['error'] = "Username or password incorrect";
            }
        }
    }
    else if(isset($_POST['logout'])){
        $_SESSION = array();
    }
    echo json_encode($toReturn);
?>
