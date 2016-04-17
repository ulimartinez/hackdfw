<?php

// Include required classes.
require('tropo.class.php');
require ('lib/limonade.php');
// Create a new Tropo object.
$tropo = new Tropo();

// Set options for an Ask.
$options = array("attempts" => 20, "bargein" => true, "choices" => "[5 DIGITS]", "name" => "zip", "timeout" => 5, "allowSignals" => array("tooLong", "farTooLong"));
$tropo->ask("Please enter your 5 digit zip code.", $options);

// Set event handlers
$tropo->on(array("event" => "continue", "next" => "get_zip_code.php?uri=end", "say" => "Please hold."));
$tropo->on(array("event" => "tooLong", "next" => "get_zip_code.php?uri=end&tooLong=true", "say" => "Please hold on."));
$tropo->on(array("event" => "farTooLong", "next" => "get_zip_code.php?uri=end&farTooLong=true", "say" => "Please hold on for dear life."));

// Render JSON for Tropo to consume.
$tropo->renderJSON();


?>