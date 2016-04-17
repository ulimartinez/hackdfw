<?php
  $email = $_POST['noe'];
  $rId = $_POST['rId'];
  $url = "http://food2fork.com/api/get/?key=c83c1fbed9af4883bc8d85b23596b560&rId=".$rId."";
  $json = file_get_contents($url);
  $recipe = json_decode($json, true);
  var_dump($recipe);

?>
