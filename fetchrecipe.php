<?php
  $rId = $_POST['rId'];
  $url = "http://food2fork.com/api/get/?key=c83c1fbed9af4883bc8d85b23596b560&rId=".$rId."";
  $json = file_get_contents($url);
  $recipe = json_decode($json, true);
  var_dump($recipe);
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
              echo '<li>'.$recipe['recipe']['ingredients'][$i].'</li>';
            }
      echo '</ul>
            <hr />
            Rating  <span class="badge">'.$recipe['recipe']['social_rank'].' <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></span>
            <a target="_blank" href="'. $recipe['recipe']['source_url'] .'"> <button class="btn btn-default"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Source</button></a>
            </div>
          </div>
        </div>';
?>
