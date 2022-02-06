<?php 
include('../admin_session.php');
include('../navi.php');
include('itemModels.php');
include('../subcategory/sctgmodels.php');

$id = $_GET['id'];

$item = getitem($id);

if (isset($_POST['update'])) {
	updateitem($_POST, $id);
	header('Location: index.php');
}

[$subcategories, $total] = getsubcategories(10000, 0, null, 'title', 'asc');
// $subcategory = getsubcategory($item['subcategory_id']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Edit Item</h2>
	<form action="edit.php?id=<?php echo $id; ?>" method="POST">
		Title <br>
		<input type="text" name="title" value='<?php echo $item['title']; ?>'> <br>
		Description <br>
		<select name="subcategory_id">
			<?php foreach ($subcategories as $key): ?>
				<option <?php if ($key['id'] == $item['subcategory_id']) {echo 'selected';} ?> value='<?php echo $key['id']; ?>' ><?php echo $key['title']; ?></option>
			<?php endforeach ?>
		</select> <br> <br>
		Price : <input style="width: 80px;" type="number" name="price" value='<?php echo $item['price']; ?>'> 
		Cost : <input style="width: 80px;" type="number" name="cost" value='<?php echo $item['cost']; ?>'> <br>
		<button name="update">Update</button>
	</form>
</body>
</html>