<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "42bc79152f6e8348d722bf7595d0521c";
$scopes = "read_orders,write_products";
$redirect_uri = "http://example.com/example/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".example.myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
