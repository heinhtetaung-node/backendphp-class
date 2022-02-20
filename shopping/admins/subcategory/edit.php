<?php 
require_once(__DIR__.'\../admin_session.php');
require_once(__DIR__.'\../navi.php');
require_once(__DIR__.'/sctgmodels.php');
require_once(__DIR__.'\../category/ctgmodels.php');

$id = $_GET['id'];

$subcategory = getsubcategory($id);

if (isset($_POST['update'])) {
	updatesubcategory($_POST, $id);
	header('Location: index.php');
}

[$categories, $total] = getcategories(10000, 0, null, 'id', 'asc');
// $category = getcategory($subcategory['category_id']);
// print_r($categories);
// if ($categories['id'] == $subcategory['category_id']) {
// 	echo 'selected';
// }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Edit Subcategory</h2>
	<form action="edit.php?id=<?php echo $id; ?>" method="POST">
		Title <br>
		<input type="textbox" name="title" value='<?php echo $subcategory['title']; ?>'> <br>
		Description <br>
		<select name="category_id">
			<?php foreach ($categories as $key): ?>
				<option <?php if ($key['id'] == $subcategory['category_id']) {echo 'selected';} ?> value='<?php echo $key['id']; ?>'><?php echo $key['title']; ?></option>
			<?php endforeach ?>
		</select> <br>
		<button name="update">Update</button>
	</form>
</body>
</html>