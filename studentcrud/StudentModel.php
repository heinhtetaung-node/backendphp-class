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

// $orderby = 'id', $order = 'desc' = giving parameter as default	
function getStudents($limit = 2, $offset = 0, $search = null, $orderby = 'id', $order = 'desc') {

	// SELECT * FROM `student` WHERE course='Javascript' LIMIT 2 OFFSET 0; (use definite condition)

	// 	SELECT 
	//  student.*,
	//  course.name AS course_name,
	//  course.startdate,
	//  course.enddate,
	//  course.price
	// FROM `student` 
	//  LEFT JOIN course 
	//  ON student.course_id = course.id;

	$sql = "
			SELECT 
			 student.*,
			 course.name AS course_name,
			 course.startdate,
			 course.enddate,
			 course.price
			FROM student 
			 LEFT JOIN course 
			 ON student.course_id = course.id
			WHERE student.name like '%$search%' 
			ORDER BY student.${orderby} ${order} 
			LIMIT ${limit} OFFSET ${offset}
		";	

		// echo $sql;
	$result = $GLOBALS['dbcon']->query($sql); // $GLOBALS['dbcon'] == $dbcon from db.php
	$arr = $result->fetch_all(MYSQLI_ASSOC);

	$sqlTotal = "SELECT COUNT(*) AS totalstudents FROM student WHERE name like '%$search%'";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();
	return [$arr, $total]; // Modern way

	// Traditional way of return multiple array;
	// return [
	// 	'arr' => $arr,
	// 	'total' => $total
	// ]
}

function insertStudent($data /* $_POST */) {
	// var_dump($_POST);
	$name = $data['stuname'];
	$age = $data['age'];
	$course_id = $data['course_id'];
	$sql = "INSERT INTO student (name, age, course_id) VALUES ('$name', '$age', '$course_id')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
	}
}

function deleteStudent($id) {
	$sql = "DELETE FROM student WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
	}
}

function getStudent($id) {
	$sql = "SELECT * FROM student WHERE id='$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc(); // return associative array
	return $row;
}

function updateStudent($student, $id) {
	$sql = "UPDATE student SET name='${student['stuname']}', age='${student['age']}', course='${student['course']}' WHERE id='$id' ";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
	} else {
		header('Location: index.php');	
	}
}
