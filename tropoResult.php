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
	
	// Create a new instance of the Session object, and get the channel information.
	$session = new Session();
	$from_info = $session->getFrom();
	$channel = $from_info['channel'];
	
	// Create a new instance of the Tropo object.
	$tropo = new Tropo();
	
	// See if any text was sent with session start.
	$initial_text = $session->getInitialText();
	
	// If the initial text is a zip code, skip the input collection and get weather information.
	if(strlen($initial_text) == 5 && is_numeric($initial_text)) {
		formatWeatherResponse($tropo, $initial_text);
	}
	
	else {
		// Welcome prompt (for phone channel, and IM/SMS sessions with invalid initial text).
		$tropo->say("Welcome to the Tropo PHP zip code example for $channel");
		
		// Set up options form zip code input
		$options = array("attempts" => 3, "bargein" => true, "choices" => "[5 DIGITS]", "name" => "zip", "timeout" => 5);
		
		// Ask the user for input, pass in options.
		$tropo->ask("Please enter your 5 digit zip code.", $options);
		
		// Tell Tropo what to do when the user has entered input, or if there is an error.
		$tropo->on(array("event" => "continue", "next" => "get_zip_code.php?uri=end", "say" => "Please hold."));
		$tropo->on(array("event" => "error", "next" => "get_zip_code.php?uri=error", "say" => "An error has occured."));
	}
	
	// Render the JSON for the Tropo WebAPI to consume.
	return $tropo->RenderJson();
	
}

/**
 * After a zip code has been entered, use it to look up weather details for that city.
 */
dispatch_post('/end', 'zip_end');
function zip_end() {
	
    // Create a new instance of the result object and get the value of the user input.
	$result = new Result();
	$zip = $result->getValue();
	
	// Create a new instance of the Tropo object.
	$tropo = new Tropo();
	$tropo->say("You selected the id $zip");
	
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