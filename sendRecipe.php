<?php
  $email = $_POST['noe'];
  $rId = $_POST['rId'];
  $url = "http://food2fork.com/api/get/?key=390d0b2ce01701c07631dc39aa7bbd5b&rId=".$rId."";
  $json = file_get_contents($url);
  $recipe = json_decode($json, true);

  // the message
  $title = $recipe['recipe']['title'];
  $msg = "<strong>$title</strong><br />";
  $msg = $msg . "\n<strong>Ingredients:</strong><ul>";

  for ($i=0; $i < sizeof($recipe['recipe']['ingredients']); $i++) {
    $msg = $msg . "\n<li>" . $recipe['recipe']['ingredients'][$i] . "</li>";
  }
  $msg = $msg . "</ul>";
  // use wordwrap() if lines are longer than 70 characters
  $msg = wordwrap($msg,70);

  // send email
  mail($email,$title,$msg);

  echo '<div class="alert alert-success" role="alert">Recipe has been sent!</div>';

?>
