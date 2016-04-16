<?php
  require_once('conn.php');
  $ing = $_POST['ing'];
  $uni = $_POST['uni'];
  $qty = $_POST['qty'];
  if($qty==''){
    echo '<br /><div class="alert alert-warning" role="alert">Quantity was not specified.</div>';
  }else{
    $sql = "INSERT INTO ingredients VALUES ('123', '$ing', '$qty', '$uni')";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    if($res){
      echo '<br /><div class="alert alert-info" role="alert">An item has been added to your pantry.</div>';
    }else{
      echo '<br /><div class="alert alert-warning" role="alert">Item was not added.</div>';
    }
    mysqli_close($con);
  }
?>
