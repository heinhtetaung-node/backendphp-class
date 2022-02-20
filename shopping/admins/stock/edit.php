<?php 
require_once(__DIR__.'\../admin_session.php');
require_once(__DIR__.'\../navi.php');
require_once(__DIR__.'\../item/itemModels.php');
require_once(__DIR__.'/StockModel.php');

$item_id = $_GET['id'];

$stock = getStockByItemId($item_id);

if (isset($_POST['add'])) {
	$qty = $_POST['qty'];
	$existingQty = $stock['quantity'];
	$updateQty = $existingQty - $qty;
	$result = updateStock($updateQty, $stock['id']);
	if ($result == true) {
		header('Location: index.php');
	}	
}
?>
<br/>
<h2>Damage Stock</h2>
<form action="" method="POST">
	Existing Qty = <?php echo $stock['quantity']; ?>
	<br />
	<br />
	Qty <input type="number" name="qty" max="<?php echo $stock['quantity']; ?>" />
	<button name="add">Damage</button>
</form>