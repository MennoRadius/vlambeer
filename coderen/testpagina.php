<?php
	require 'config/config.php';
	include 'include/header.php';

	$sql = "SELECT * FROM product";
	$stmt = $db->query($sql);
	$products = $stmt->fetchAll(PDO::FETCH_OBJ);
	
	foreach ($products as $product) {

	$btw = 1.21;
	$product_price = $product->product_price;
	$product_with_btw = $product_price * $btw;

	$sale = $product_price - $product->sales_amount;

	// deel / geheel x 100

	echo '<h1>€' . $product->product_price . ',- + 21% btw €' . $product_with_btw . ',-</h1>';
	echo '<br>';
	echo '<h1>€' . $product->product_price . ' - ' . $product->sales_amount . '% = €' . $sale . '</h1>';

	}
?>