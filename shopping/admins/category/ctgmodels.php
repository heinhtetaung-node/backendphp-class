<?php

$baseUrl='';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
     $baseUrl = "https://";   
else  
     $baseUrl = "http://";   
$baseUrl.= $_SERVER['HTTP_HOST'];   
$uri = $_SERVER['REQUEST_URI']; 
$uriArr = explode('/', $uri);
$escapeFolder = '';

if ($uriArr[2] == 'admins' && count($uriArr) > 3) {
	$escapeFolder = '../';
}

if (!isset($GLOBALS['dbcon'])) {
	include($escapeFolder.'db.php');
}


function getcategories($limit=2, $offset=0, $search=null, $orderby='id', $order='desc') {
	$sql = "SELECT * FROM category WHERE title like '%$search%' ORDER BY ${orderby} ${order} LIMIT ${limit} OFFSET ${offset}";

	$result = $GLOBALS['dbcon']->query($sql);
	$array = $result->fetch_all(MYSQLI_ASSOC);
	
	$sqlTotal = "SELECT COUNT(*) AS totalcategory FROM category WHERE title LIKE '%$search%'";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();

	return [$array, $total];
}

function insertcategory($data) {
	$title = $data['title'];
	$description = $data['description'];
	$sql = "INSERT INTO category (`title`, `description`) VALUES ('$title','$description')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "somthing wrong";
	}
}

function deletecategory($id) {
	$sql = "DELETE FROM category WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "something wrong";
	}
}

function getcategory($id){
	$sql = "SELECT * FROM category WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;
}

function updatecategory($category, $id) {
	$sql = "UPDATE category SET title = '${category['title']}', description = '${category['description']}' WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "something wrong";
	} else{
		header('Location: index.php');
	}
}



?>