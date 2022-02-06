<?php
$uri = $_SERVER['REQUEST_URI'];    
$uriArr = explode('/', $uri); // change string to array

$escapeFolder = '';
if ($uriArr[2] == 'course') {
	$escapeFolder = '../';
}

if (!isset($GLOBALS['dbcon'])) {
	include($escapeFolder."db.php");
}

function getCourses($limit = 2, $offset = 0, $search = null, $orderby = 'id', $order = 'desc') {


	$sql = "SELECT * FROM course WHERE name like '%$search%' ORDER BY ${orderby} ${order} 
	LIMIT ${limit} OFFSET ${offset}";	
	$result = $GLOBALS['dbcon']->query($sql); // $GLOBALS['dbcon'] == $dbcon from db.php
	$arr = $result->fetch_all(MYSQLI_ASSOC);

	$sqlTotal = "SELECT COUNT(*) AS totalcourses FROM course WHERE name like '%$search%'";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();
	return [$arr, $total];
}

function insertCourse($data /* $_POST */) {
	$name = $data['name'];
	$description = $data['description'];
	$startdate = $data['startdate'];
	$enddate = $data['enddate'];
	$price = $data['price'];
	
	$sql = "INSERT INTO course (name, description, startdate, enddate, price) VALUES ('$name', '$description', '$startdate', '$enddate', '$price')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
	}
}

function deleteCourse($id) {

}

function getCourse($id) {

}

function updateCourse($student, $id) {

}
