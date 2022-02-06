<?php 
include('../admin_session.php');
include('../navi.php');
include('ctgmodels.php');

$id = $_GET['id'];

$category = getcategory($id);

if (isset($_POST['update'])) {
	updatecategory($_POST, $id);
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
	<h2>Edit Category</h2>
	<form action="edit.php?id=<?php echo $id; ?>" method="POST">
		Title <br>
		<input type="textbox" name="title" value='<?php echo $category['title']; ?>'> <br>
		Description <br>
		<input type="textbox" name="description" value='<?php echo $category['description']; ?>'> <br>
		<button name="update">Update</button>
	</form>
</body>
</html>