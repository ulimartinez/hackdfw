<?php
  require_once('conn.php');
  if(!isset($_SESSION)){
    session_start();
  }
  $una = $_SESSION['user'];
  $uid = $_SESSION['id'];
  $sql = "SELECT * FROM allergies WHERE id = '$uid'";
  $results = mysqli_query($con, $sql);
  if(mysqli_num_rows($results) > 0){
    echo '<table class="table table-bordered">
            <thead>
              <th>Allergen</th>
            </thead>
            <tbody>';
    while($row = mysqli_fetch_assoc($results)){
        echo '<tr>
              <td>'. $row['allergie'] .'</td>
              </tr>';
    }
    echo '  </tbody>
          </table>';
    echo '<button class="btn btn-primary" id="clearAll"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Empty Allergen(s)</button>';
  }else{
    echo '<div class="alert alert-warning" role="alert">You have not added any allergies to your list.</div>';
  }
?>
