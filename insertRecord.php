<?php
  require_once('conn.php');
  $ing = $_POST['ing'];
  $uni = $_POST['uni'];
  $qty = $_POST['qty'];
  if($qty==''){
    echo '<br /><div class="alert alert-warning" role="alert">Quantity was not specified.</div>';
  }else{
    $sql = "SELECT * FROM ingredients WHERE id = '123' AND name = '$ing'";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_assoc($res);
      $total = $qty + $row['quantity'];
      $sql = "UPDATE ingredients SET quantity = '$total' WHERE id = '123' AND name = '$ing'";
      $res = mysqli_query($con, $sql) or die(mysqli_error($con));
      if($res){
        echo '<br /><div class="alert alert-info" role="alert">The quantity of an item has been updated.</div>';
      }else{
        echo '<br /><div class="alert alert-warning" role="alert">Item was not added.</div>';
      }
    }
    else{
      $sql = "INSERT INTO ingredients VALUES ('123', '$ing', '$qty', '$uni')";
      $res = mysqli_query($con, $sql) or die(mysqli_error($con));
      if($res){
        echo '<br /><div class="alert alert-info" role="alert">An item has been added to your pantry.</div>';
      }else{
        echo '<br /><div class="alert alert-warning" role="alert">Item was not added.</div>';
      }
    }
    mysqli_close($con);
  }
?>
