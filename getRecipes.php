<?php
  include 'conn.php';
  $sql = "SELECT name FROM ingredients WHERE id = '$_SESSION[id]'";
  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($res);
  $ingredients = $row['name'];
  while($row = mysqli_fetch_assoc($res)){
    $ingredients = $ingredients . ", " . $row['name'];
  }
  $url = "http://food2fork.com/api/search?key=c83c1fbed9af4883bc8d85b23596b560&q=".$ingredients."";
  $json = file_get_contents($url);
  $recipes = json_decode($json, true);
  echo '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">With (some) ingredients that I have</h3>
    </div>
    <div class="panel-body">';
    echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="width:100%; height:350px;">';
            for ($i=0; $i < 5; $i++) {
              if($i == 0){
                echo '<div class="item active">
                        <img id="'. $recipes['recipes'][$i]['recipe_id'] .'"class="centered-image" src="'. $recipes['recipes'][$i]['image_url'] .'" alt="Recipe">
                        <div class="carousel-caption">
                          <h3>'. $recipes['recipes'][$i]['title'] .'</h3>
                        </div>
                      </div>';
              }else{
                echo '<div class="item">
                        <img id="'. $recipes['recipes'][$i]['recipe_id'] .'"class="centered-image" src="'. $recipes['recipes'][$i]['image_url'] .'" alt="Recipe">
                        <div class="carousel-caption">
                          <h3>'. $recipes['recipes'][$i]['title'] .'</h3>
                        </div>
                      </div>';
              }
            }
    echo '  </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>';

  echo '
      </div>
  </div>';

?>
