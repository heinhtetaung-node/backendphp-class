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


function getOrders($customer_id = NULL, $limit = 5, $offset = 0, $search = null, $orderby = 'id', $order = 'desc') {
	
	$selectSql = "
			SELECT %s 
			FROM orders
			LEFT JOIN customer 
			ON customer.id = orders.customer_id
			WHERE customer.name like '%$search%' ";

	$sql = sprintf($selectSql, "orders.*, customer.name AS cusname ");

	if ($customer_id != NULL) {
		$sql .= " AND orders.customer_id='${customer_id}' ";
	}
	$orderSql = "
			ORDER BY orders.${orderby} ${order} 
			LIMIT ${limit} OFFSET ${offset}
			";
	
	$result = $GLOBALS['dbcon']->query($sql.$orderSql);

	$arr = $result->fetch_all(MYSQLI_ASSOC);

	$sqlTotal = sprintf($selectSql, "count(*) AS totalorders");
	
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);

	$total = $resultTotal->fetch_assoc();
	return [$arr, $total];
}

function getOrderDetail($order_id) {
	$sql = "
			SELECT order_items.*, item.title FROM order_items 
			LEFT JOIN item
			ON item.id = order_items.item_id
			WHERE order_items.orders_id = '${order_id}';
		";
	$result = $GLOBALS['dbcon']->query($sql);

	$arr = $result->fetch_all(MYSQLI_ASSOC);

	return $arr;
}