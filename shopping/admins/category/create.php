<?php
include('../admin_session.php');
include('../navi.php');
include('ctgmodels.php');

if (isset($_POST['add'])) {
	insertcategory($_POST);
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Create Category</h2>
	<form style="border: 1px solid black; padding: 20px;" action="" method="POST">
		Title <br>
		<input type="text" name="title"> <br>
		Description <br>
		<input type="text" name="description"> <br>
		<button name="add">add</button>
	</form>
</body>
</html>