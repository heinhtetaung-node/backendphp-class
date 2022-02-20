<?php

// $baseUrl='';
// if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
//      $baseUrl = "https://";   
// else  
//      $baseUrl = "http://";   
// $baseUrl.= $_SERVER['HTTP_HOST'];   
// $uri = $_SERVER['REQUEST_URI']; 
// $uriArr = explode('/', $uri);
// $escapeFolder = '';

// if ($uriArr[3] == 'subcategory') {
// 	$escapeFolder = '../';
// }

// if (!isset($GLOBALS['dbcon'])) {
	require_once(__DIR__.'\../db.php');
// }

function getsubcategories($limit=2, $offset=0, $search=null, $orderby='id', $order='desc') {
	$sql = "SELECT subcategory.*, 
	category.title AS category_title 
	FROM subcategory LEFT JOIN category
	ON subcategory.category_id = category.id
	WHERE subcategory.title like '%$search%' 
	ORDER BY subcategory.${orderby} ${order} LIMIT ${limit} OFFSET ${offset}";

	$result = $GLOBALS['dbcon']->query($sql);
	$array = $result->fetch_all(MYSQLI_ASSOC);
	
	$sqlTotal = "SELECT COUNT(*) AS totalsubcategory FROM subcategory WHERE title LIKE '%$search%'";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();

	return [$array, $total];
}

function insertsubcategory($data) {
	$title = $data['title'];
	$category = $data['category_id'];
	$sql = "INSERT INTO subcategory (`title`, `category_id`) VALUES ('$title','$category')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "somthing wrong";
	}
}

function deletesubcategory($id) {
	$sql = "DELETE FROM subcategory WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "something wrong";
	}
}

function getsubcategory($id){
	$sql = "SELECT * FROM subcategory WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;
}

function updatesubcategory($subcategory, $id) {
	$sql = "UPDATE subcategory SET title = '${subcategory['title']}', category_id = '${subcategory['category_id']}' WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "something wrong";
	} else{
		header('Location: index.php');
	}
}



?>