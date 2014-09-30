<?php

// Get our helper functions
require_once("inc/functions.php");

// Set variables for our request
$shop = "demo-shop";
$token = "SWplI7gKAckAlF9QfAvv9yrI3grYsSkw";
$query = array(
	"Content-type" => "application/json" // Tell Shopify that we're expecting a response in JSON format
);

// Run API call to get products
$products = shopify_call($token, $shop, "/admin/products.json", array(), 'GET');

// Convert product JSON information into an array
$products = json_decode($products['response'], TRUE);

// Get the ID of the first product
$product_id = $products['products'][0]['id'];

// Modify product data
$modify_data = array(
	"product" => array(
		"id" => $product_id,
		"title" => "My New Title"
	)
);

// Run API call to modify the product
$modified_product = shopify_call($token, $shop, "/admin/products/" . $product_id . ".json", $modify_data, 'PUT');

// Storage response
$modified_product_response = $modified_product['response'];