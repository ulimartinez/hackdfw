<?php
  include 'conn.php';
  $url = "http://food2fork.com/api/search?key=390d0b2ce01701c07631dc39aa7bbd5b&sort=t";
  $json = file_get_contents($url);
  $recipes = json_decode($json, true);
  echo '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><strong>Top Recipes</strong></h3>
    </div>
    <div class="panel-body">';
    echo '<div id="myCarousel2" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel2" data-slide-to="1"></li>
              <li data-target="#myCarousel2" data-slide-to="2"></li>
              <li data-target="#myCarousel2" data-slide-to="3"></li>
              <li data-target="#myCarousel2" data-slide-to="4"></li>
              <li data-target="#myCarousel2" data-slide-to="5"></li>
              <li data-target="#myCarousel2" data-slide-to="6"></li>
              <li data-target="#myCarousel2" data-slide-to="7"></li>
              <li data-target="#myCarousel2" data-slide-to="8"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="width:100%; height:350px;">';
            // var_dump($recipes);
            for ($i=0; $i < 8; $i++) {
              if($i == 0){
                echo '<div class="item active">
                          <a href="#targetDiv_recipe"><img id="'. $recipes['recipes'][$i]['recipe_id'] .'"class="centered-image" src="'. $recipes['recipes'][$i]['image_url'] .'" alt="Recipe"></a>
                        <div class="carousel-caption">
                          <h3>'. $recipes['recipes'][$i]['title'] .'</h3>
                        </div>
                      </div>';
              }else{
                echo '<div class="item">
                        <a href="#targetDiv_recipe"><img id="'. $recipes['recipes'][$i]['recipe_id'] .'"class="centered-image" src="'. $recipes['recipes'][$i]['image_url'] .'" alt="Recipe"></a>
                        <div class="carousel-caption">
                          <h3>'. $recipes['recipes'][$i]['title'] .'</h3>
                        </div>
                      </div>';
              }
            }
    echo '  </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>';

  echo '
      </div>
  </div>';
  // <div class="panel-footer">
  //   <a href="recipeList.php?"><button class="btn btn-primary"><i class="fa fa-list fa-1x"></i> View List</button></a>
  // </div>
?>
