<?php
  session_start();
  function checkIngs($str){
    include 'conn.php';
    $sql = "SELECT * FROM ingredients WHERE id = '$_SESSION[id]'";
    $res = mysqli_query($con, $sql);
    $arr;
    $i = 0;
    while($row = mysqli_fetch_assoc($res)){
      $arr[$i] = $row['name'];
      $i++;
    }
    for ($i=0; $i < sizeof($arr); $i++) {
      if (strpos(strtolower($str), strtolower($arr[$i])) !== false) {
          return true;
      }
    }
    return false;
  }
  function checkAlgs($str){
    include 'conn.php';
    $sql = "SELECT * FROM allergies WHERE id = '$_SESSION[id]'";
    $res = mysqli_query($con, $sql);
    $arr;
    $i = 0;
    while($row = mysqli_fetch_assoc($res)){
      $arr[$i] = $row['allergie'];
      $i++;
    }
    for ($i=0; $i < sizeof($arr); $i++) {
      if (strpos(strtolower($str), strtolower($arr[$i])) !== false) {
          echo '<div class="alert alert-danger" role="alert"><strong>Warning</strong>! You are allergic to this! Why did you even add it...?</div>';
      }
    }
    return false;
  }
  $rId = $_POST['rId'];
  $url = "http://food2fork.com/api/get/?key=c83c1fbed9af4883bc8d85b23596b560&rId=".$rId."";
  $json = file_get_contents($url);
  $recipe = json_decode($json, true);
  echo '<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>'. $recipe['recipe']['title'] .'</strong></h3>
          </div>
          <div class="panel-body">
            <div class="col-lg-6">
              <img class="img-responsive" src="'. $recipe['recipe']['image_url'] .'" />
            </div>
            <div class="col-lg-6">
            <ul>';
            for ($i=0; $i < sizeof($recipe['recipe']['ingredients']); $i++) {
              if(checkIngs($recipe['recipe']['ingredients'][$i]) == true){
                echo '<li style="color:green;">'.$recipe['recipe']['ingredients'][$i].' <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></li>';
                checkAlgs($recipe['recipe']['ingredients'][$i]);
              }else{
                echo '<li style="color:rgb(201, 177, 48);">'.$recipe['recipe']['ingredients'][$i].' <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></li>';
                checkAlgs($recipe['recipe']['ingredients'][$i]);
              }
            }
      echo '</ul>';
      echo '<hr />
            <form class="form-inline" role="form" style="display:inline-block;">
              <input name="rId" id="rId" value="'. $recipe['recipe']['recipe_id'] .'" hidden />
              <div class="form-group">
                <label for="sto">Send to:</label>
                <select class="form-control" id="sto" name="sto">
                  <option disabled>SMS</option>
                  <option>Email</option>
                </select>
              </div>
              <div class="form-group">
                <label for="noe"></label>
                <input type="email" class="form-control" id="noe" name="noe" required>
              </div>
            </form>
            <button style="display:inline-block;" id="sendRecipe" class="btn btn-primary"><i class="fa fa-envelope fa-fw"></i> Send</button><br />
            <div id="message_sent">
            
            </div>
            ';
      echo '<hr />
            Rating  <span class="badge"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> '. round($recipe['recipe']['social_rank'], 2) .'</span>
            <a target="_blank" href="'. $recipe['recipe']['source_url'] .'"> <button class="btn btn-default"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Source</button></a>';

      echo '
            </div>
          </div>
        </div>';
?>
