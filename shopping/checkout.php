<?php
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/admins/item/itemModels.php');

if (isset($_POST['update'])) {
	$qty = $_POST['qty'];
	$key = $_POST['key'];
	if ($qty > 0) {
		$_SESSION['products'][$key]['qty'] = $qty;
	} else {
		removeProductFromSession($key);
	}
}

if (isset($_POST['remove'])) {
	removeProductFromSession($_POST['key']);
}

function removeProductFromSession($key) {
	$products = $_SESSION['products'];
	array_splice($products, $key, 1);
	$_SESSION['products'] = $products;
}
?>

<div style="width: 1180px; height: auto; justify-content: center; display:flex; flex-wrap: wrap;">

<table style="width:80%">
<thead>
	<tr>
		<th>Name</th>
		<th>Price</th>
		<th>Qty</th>
		<th>Total</th>
		<th></th>
	</tr>
</thead>

<tbody>
<?php
// $products = [];
// if (isset($_SESSION['products'])) {
// 	$products = $_SESSION['products'];
// }

$products = (isset($_SESSION['products'])) ? $_SESSION['products'] : [];
$alltotal = 0;
foreach ($products as $key => $pro) {
	$item = getitem($pro['id']);
	?>
	<tr>
		<form action="" method="POST">
			<td><?php echo $item['title']; ?></td>
			<td><?php echo $item['price']; ?></td>
			<td>
				<input type="text" value="<?php echo $pro['qty']; ?>" name="qty" />
				<input type="hidden" name="key" value="<?php echo $key; ?>">				
			</td>
			<td><?php echo $item['price'] * $pro['qty']; ?></td>
			<td>
				<button name="update">Update</button>
				<button name="remove">Remove</button>
			</td>
		</form>
	</tr>
	<?php
	$onetotal = $item['price'] * $pro['qty'];
	// $alltotal = $alltotal + $onetotal;
	$alltotal += $onetotal;
}
?>
</tbody>

<tfoot>
	<tr>
		<td></td>
		<td></td>
		<td>Total</td>
		<td><?php echo $alltotal; ?></td>
		<td></td>
	</tr>
</tfoot>

</table>
<?php
if (isset($_SESSION['login_user'])) : ?>
	<a href="order.php"><button>Confirm Checkout</button></a><?php
endif; 
?>

<?php
if (!isset($_SESSION['login_user'])) : ?>
	<a href="login.php?redirect=order.php"><button>Login/Register to Checkout</button></a><?php
endif; 
?>
</div>
<?php require_once('footer.php'); ?>