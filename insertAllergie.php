<?php
  require_once('conn.php');
  session_start();
  $una = $_SESSION['user'];
  $uid = $_SESSION['id'];
  $alg = $_POST['alg'];

  $sql = "SELECT * FROM allergen_list WHERE allergen = '$alg'";
  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
  if(mysqli_num_rows($res) == 0){
    $sql = "INSERT INTO allergen_list (allergen)VALUES('$alg')";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
  }

  $sql = "SELECT * FROM allergies WHERE id = '$uid' AND allergie = '$alg'";
  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
  if(mysqli_num_rows($res) > 0){
    echo '<br /><div class="alert alert-info" role="alert">Allergen has been previously added.</div>';
  }
  else{
    $sql = "INSERT INTO allergies VALUES ('$alg', '$uid')";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    if($res){
      echo '<br /><div class="alert alert-info" role="alert">An allergen has been added to your list.</div>';
    }else{
      echo '<br /><div class="alert alert-warning" role="alert">Allergen was not added.</div>';
    }
  }
  mysqli_close($con);
?>
