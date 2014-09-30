<?php

// Get our helper functions
require_once("inc/functions.php");

// Set variables for our request
$shop = "demo-shop";
$api_key = "1r30mrvCFMfq2DLGuIXyY2veEJVgTtDD";
$shared_secret = "TBB5wltKarRtKn5mUVZck9RxHePNN6Jo";
$code = $_GET["code"];
$timestamp = $_GET["timestamp"];
$signature = $_GET["signature"];

// Compile signature data
$signature_data = $shared_secret . "code=" . $code . "shop=". $shop . ".myshopify.comtimestamp=" . $timestamp;

// Use signature data to check that the response is from Shopify or not
if (md5($signature_data) === $signature) {

	// Set variables for our request
	$query = array(
		"Content-type" => "application/json", // Tell Shopify that we're expecting a response in JSON format
		"client_id" => $api_key, // Your API key
		"client_secret" => $shared_secret, // Your app credentials (secret key)
		"code" => $code // Grab the access key from the URL
	);

	// Call our Shopify function
	$shopify_response = shopify_call(NULL, $shop, "/admin/oauth/access_token", $query, 'POST');

	// Convert response into a nice and simple array
	$shopify_response = json_decode($shopify_response['response'], TRUE);

	// Store the response
	$token = $shopify_response['access_token'];

	// Show token (DO NOT DO THIS IN YOUR PRODUCTION ENVIRONMENT)
	echo $token;

} else {
	// Someone is trying to be shady!
	die('This request is NOT from Shopify!');
}