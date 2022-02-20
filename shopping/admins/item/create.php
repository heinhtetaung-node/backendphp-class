<?php
require_once(__DIR__.'\../admin_session.php');
require_once(__DIR__.'\../navi.php');
require_once(__DIR__.'/itemModels.php');
require_once(__DIR__.'\../subcategory/sctgmodels.php');

if (isset($_POST['add'])) {
	// 1st upload to project directory
	$photoName = uploadPhoto($_FILES); // return '' or photoname.png
	// 2nd filename should be save to database 
	$_POST['photo_name'] = $photoName;
	insertitem($_POST);
	header('Location: index.php');
}

[$subcategories, $total] = getsubcategories(100, 0, null, 'title', 'asc');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Create Item</h2>
	<form style="border: 1px solid black; padding: 20px;" action="" method="POST" enctype="multipart/form-data">
		Title <br>
		<input type="text" name="title"> <br> <br>
		Category <br> 
		<select name="subcategory_id">
			<?php foreach ($subcategories as $key): ?>
				<option value='<?php echo $key['id']; ?>'><?php echo $key['title']; ?></option>
			<?php endforeach ?>
		</select> <br> <br>
		Photo : <input type="file" name="photo"> <br> <br>
		Price : <input style="width: 80px;" type="number" name="price"> 
		Cost : <input style="width: 80px;" type="number" name="cost"> <br>
		<button name="add">Add</button>
	</form>
</body>
</html>