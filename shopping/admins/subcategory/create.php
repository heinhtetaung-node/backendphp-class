<?php
require_once(__DIR__.'\../admin_session.php');
require_once(__DIR__.'\../navi.php');
require_once(__DIR__.'/sctgmodels.php');
require_once(__DIR__.'\../category/ctgmodels.php');

if (isset($_POST['add'])) {
	insertsubcategory($_POST);
	header('Location: index.php');
}

[$categories, $total] = getcategories(100, 0, null, 'title', 'asc');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Create Subcategory</h2>
	<form style="border: 1px solid black; padding: 20px;" action="" method="POST">
		Title <br>
		<input type="text" name="title"> <br>
		Category <br>
		<select name="category_id">
			<?php foreach ($categories as $key): ?>
				<option value='<?php echo $key['id']; ?>'><?php echo $key['title']; ?></option>
			<?php endforeach ?>
		</select>
		<button name="add">Add</button>
	</form>
</body>
</html>