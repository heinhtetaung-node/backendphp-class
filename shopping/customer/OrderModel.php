<?php

function insertOrder() {
	$login_user = $_SESSION['login_user'];
	var_dump($login_user);
	$customer_id = $login_user['id'];

	$products = $_SESSION['products'];
	$total = 0;
	foreach($products as $key => $p) {
		$item = getitem($p['id']);
		$onetotal = $p['qty'] * $item['price'];
		$products[$key]['price'] = $item['price'];
		$total += $onetotal;
	}

	$sql = "INSERT INTO orders (customer_id, total) VALUES ('$customer_id', '$total')";
	echo $sql;

	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
		return false;
	}
	$order_id = $GLOBALS['dbcon']->insert_id;
	foreach ($products as $p) {
		$item_id = $p['id'];
		$qty = $p['qty'];
		$orderprice = $p['price'];
		$sql = "
			INSERT INTO order_items 
			(orders_id, item_id, qty, orderprice) VALUES 
			('$order_id', '$item_id', '$qty', '$orderprice')
		";
		$result = $GLOBALS['dbcon']->query($sql);
		if ($result != true) {
			echo 'something wrong';
			return false;
		}	
	}
	return true;
}
