<?php

// $uri = $_SERVER['REQUEST_URI']; 
// $uriArr = explode('/', $uri);
// $escapeFolder = '';

// // if ($uriArr[3] == 'item' || $uriArr[3] == 'stock') {
// if ($uriArr[2] == 'admins' && count($uriArr) > 3) {
// 	$escapeFolder = '../';
// }

// if (!isset($GLOBALS['dbcon'])) {
	require_once(__DIR__.'\../db.php');
// }

function getStockByItemId($item_id) {
	$sql = "select * from stock where item_id = '${item_id}'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;
}

function updateStock($updateQty, $id) {
	$sql = "update stock set quantity = '${updateQty}' where id = '${id}'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
		return false;
	}
	return true;
} 

function insertStock($item_id, $qty) {
	$sql = "insert into stock (item_id, quantity) values ('${item_id}', '${qty}')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
		return false;
	}
	return true;
}

function getStocks($limit=2, $offset=0, $search=null, $orderby='id', $order='desc') {
	$sql = "SELECT stock.*, item.title AS itemname FROM stock
			LEFT JOIN item
			ON item.id = stock.item_id
	ORDER BY stock.${orderby} ${order} LIMIT ${limit} OFFSET ${offset}";

	$result = $GLOBALS['dbcon']->query($sql);
	$array = $result->fetch_all(MYSQLI_ASSOC);
	
	$sqlTotal = "SELECT COUNT(*) AS totalitem FROM stock";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();

	return [$array, $total];
}