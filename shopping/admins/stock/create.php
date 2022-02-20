<?php 
require_once(__DIR__.'\../admin_session.php');
require_once(__DIR__.'\../navi.php');
require_once(__DIR__.'\../item/itemModels.php');
require_once(__DIR__.'/StockModel.php');

if (isset($_POST['add'])) {
	$qty = $_POST['qty'];
	$item_id = $_POST['item_id'];
	$stock = getStockByItemId($item_id);
	if ($stock != null) {
		$existingQty = $stock['quantity'];
		$updateQty = $existingQty + $qty;
		$result = updateStock($updateQty, $stock['id']);
		if ($result == true) {
			header('Location: index.php');
		}
	} else {
		$result = insertStock($item_id, $qty);
		if ($result == true) {
			header('Location: index.php');
		}
	}
}

[$items, $total] = getitems(1000);
?>
<br/>
<h2>Adding Stock</h2>
<form action="" method="POST">
	Item 
	<select name="item_id">
		<?php foreach($items as $item): ?>
			<option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>
		<?php endforeach; ?>
	</select>
	<br />
	<br />
	Qty <input type="number" name="qty" />
	<button name="add">Add</button>
</form>