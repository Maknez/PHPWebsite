<?php
 

	$temp = $_GET['cart'];
	$product = $_GET['productID'];
	$quantity = $_GET['quantity'];
	if(isset($_GET['array'])) {
		$array = $_GET['array'];
	}
	
	$array = array(
		$temp => array(
			'product' => $product,
			'quantity' => $quantity
		)
	);
	
	
	$_SESSION['table_index_cart'] = $temp;
	$_SESSION['items_in_checkout'] = $quantity;
	$_SESSION['checkout_array'] = $array;
	echo $temp;
	echo $array[$temp]['product'].": In stock: ".$array[$temp]['quantity'];
	$temp++;
	//header('Location: index.php');
?>


