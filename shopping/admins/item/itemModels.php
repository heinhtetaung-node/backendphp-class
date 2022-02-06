<?php
 
$uri = $_SERVER['REQUEST_URI']; 
$uriArr = explode('/', $uri);
$escapeFolder = '';

if ($uriArr[2] == 'admins' && count($uriArr) > 3) {
	$escapeFolder = '../';
}

if (!isset($GLOBALS['dbcon'])) {
	include($escapeFolder.'db.php');
}

function getitems($limit=2, $offset=0, $search=null, $orderby='id', $order='desc') {
	$sql = "SELECT item.*,
	subcategory.title AS subcategory_title 
	FROM item LEFT JOIN subcategory
	ON item.subcategory_id = subcategory.id
	WHERE item.title like '%$search%' 
	ORDER BY item.${orderby} ${order} LIMIT ${limit} OFFSET ${offset}";

	$result = $GLOBALS['dbcon']->query($sql);
	$array = $result->fetch_all(MYSQLI_ASSOC);
	
	$sqlTotal = "SELECT COUNT(*) AS totalitem FROM item WHERE title LIKE '%$search%'";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();

	return [$array, $total];
}

function insertitem($data) {
	$title = $data['title'];
	$subcategory_id = $data['subcategory_id'];
	$price = $data['price'];
	$cost = $data['cost'];
	$sql = "INSERT INTO item (`title`, `subcategory_id`, `price`, `cost`, `photo_name`) VALUES ('$title','$subcategory_id', '$price', '$cost', '${data['photo_name']}')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "somthing wrong";
	}
}

// 1st upload photo
function uploadPhoto($files) {

	$result = '';
	if (isset($files['photo']['name'])) {
		$photoArr = $files['photo'];
		$photoName = $photoArr['name'];

		$arr = ['image/png', 'image/jpg', 'image/webp', 'image/svg', 'image/jpeg', 'image/JPG', 'image/PNG'];
		$type = $photoArr['type'];
		$isImage = in_array($type, $arr);	// true or false	


		if ($photoName != "" && $isImage == true) {
			$photoName = date('YmdHis') . str_replace(' ', '-', $photoName);
			$res = move_uploaded_file($photoArr['tmp_name'], "../../uploads/${photoName}");
			if ($res != true) {
				echo 'something wrong in photo upload';				
			} else {
				$result = $photoName;
			}	
		}
	}
	return $result;
}

function deleteitem($id) {
	$sql = "DELETE FROM item WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "something wrong";
	}
}

function getitem($id){
	$sql = "SELECT * FROM item WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;
}

function updateitem($item, $id) {
	$sql = "UPDATE item SET title = '${item['title']}', subcategory_id = '${item['subcategory_id']}' WHERE id = '$id'";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo "something wrong";
	} else{
		header('Location: index.php');
	}
}

function getItemsByCategory($category_id, $limit=2, $offset=0, $search=null, $orderby='id', $order='desc') {
	$sql = "SELECT 
			  item.*,
			  subcategory.title AS subcategory_title,
			  category.id AS catId,
			  category.title AS category_title
			FROM item 
			  LEFT JOIN subcategory
			  ON item.subcategory_id = subcategory.id

			  LEFT JOIN category
			  ON category.id = subcategory.category_id

			WHERE 
			  item.title like '%$search%'
			  AND subcategory.category_id = '${category_id}'
			ORDER BY item.${orderby} ${order} LIMIT ${limit} OFFSET ${offset}";

	$result = $GLOBALS['dbcon']->query($sql);
	$array = $result->fetch_all(MYSQLI_ASSOC);
	
	$sqlTotal = "SELECT COUNT(*) AS totalitem 
				 FROM item 
				  LEFT JOIN subcategory 
				  ON subcategory.id = item.subcategory_id
				 WHERE item.title LIKE '%$search%' 
				 AND subcategory.category_id = '${category_id}'";

	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();

	return [$array, $total];
}



?>