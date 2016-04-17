<?php

// Include required classes.
require('tropo.class.php');
require ('lib/limonade.php');
// Create a new Tropo object.
$tropo = new Tropo();

// Set options for an Ask.
$options = array("attempts" => 5, "bargein" => true, "choices" => "[4 DIGITS]", "name" => "id", "timeout" => 10);
$tropo->ask("Please enter your 4 digit identification number.", $options);

// Set event handlers
$tropo->on(array("event" => "continue", "next" => "tropoResult.php?uri=end", "say" => "Please hold."));
// Render JSON for Tropo to consume.
$tropo->renderJSON();


?>