<?php
  include 'conn.php';
  $sql = "TRUNCATE TABLE allergies";
  $res = mysqli_query($con, $sql);
  if($res){
    echo "Pantry has been empited.";
  }else{
    echo "Pantry was not emptied.";
  }
?>
