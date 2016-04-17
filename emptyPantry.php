<?php
  include 'conn.php';
  $sql = "TRUNCATE TABLE ingredients";
  $res = mysqli_query($con, $sql);
  if($res){
    echo "Pantry has been empited.";
  }else{
    echo "Pantry was not emptied.";
  }
?>
