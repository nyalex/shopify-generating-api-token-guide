<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Customizers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <?php

 include_once("/inc/functions.php");
 include_once("header.php");


 
 ?>
</head>

<body style="background-color:#f6f6f7 !important;">
<div class="container">
<div style="text-align:left;">
<?php

 $orders_db= shopify_call($token,$shop_url,"/admin/api/2020-01/orders.json?limit=20 ",array(),'GET');


// Pagination 
$t = $orders_db[0];
$prev = false;
$next = false;

if($t) {
	$links = explode(',', $t);
	foreach($links as $link) {
		if(strpos($link, 'rel="previous"')) {
			preg_match('~<(.*?)>~', $link, $prev);
		} elseif(strpos($link, 'rel="next"')) {
			preg_match('~<(.*?)>~', $link, $next);
		}
	}
}
echo $prev[1];
echo '<hr>';
echo $next[1];
// Now you can easily use the previous and next link for displaying orders with pagination, instead of limiting yourself with 250 


 $orders_db =json_decode($orders_db['response'],JSON_PRETTY_PRINT);

  foreach ($orders_db as $order_db) {
// Your code here 
}
				 
					?>
							
						
			

</div>
</body>
</html>

