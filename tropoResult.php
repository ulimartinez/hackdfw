<?php

// Include Tropo classes.
require('tropo.class.php');

// Include Limonade framework.
require('lib/limonade.php');

/**
 * This is the starting point for the Tropo application.
 * Get a 5 digit zip code from the user.
 */
dispatch_post('/start', 'zip_start');
function zip_start() {
	$session = new Session();
	// Create a new instance of the Tropo object.
	$tropo = new Tropo();
	
	$tropo->say("Welcome to Cook Pal.");
		
	// Set up options form zip code input
	$options = array("attempts" => 5, "bargein" => true, "choices" => "[4 DIGITS]", "name" => "id", "timeout" => 10);
	$tropo->ask("Please enter your 4 digit identification number.", $options);

	// Set event handlers
	$tropo->on(array("event" => "continue", "next" => "tropoResult.php?uri=end", "say" => "Please hold."));
	// Render JSON for Tropo to consume.
	return $tropo->renderJSON();
}

/**
 * After a zip code has been entered, use it to look up weather details for that city.
 */
dispatch_post('/end', 'zip_end');
function zip_end() {
	
    // Create a new instance of the result object and get the value of the user input.
	//$result = new Result();
	//$zip = $result->getValue();
	
	// Create a new instance of the Tropo object.
	$tropo = new Tropo();
	$tropo->say("You selected the id zip");
	
    // Render the JSON for the Tropo WebAPI to consume.
    return $tropo->RenderJson();
	
}

/**
 * If an error occurs, end the session.
 */
dispatch_post('/error', 'zip_error');
function zip_error() {
	
	// Step 1. Create a new instance of the Tropo object.
	$tropo = new Tropo();
	
	// Step 2. This is the last thing the user will be told before the session ends.
	$tropo->say("Please try your request again later.");
	
	// Step 3. End the session.
	$tropo->hangup();
	
	// Step 4. Render the JSON for the Tropo WebAPI to consume.
	return $tropo->renderJSON();
}

// Run this sucker!
run();

?>