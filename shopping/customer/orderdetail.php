<?php
session_start();

if (!isset($_SESSION['login_user']) && !isset($_SESSION['user'])) {	
	header('Location: ../login.php');
}

if (isset($_SESSION['login_user'])) {

	include('../header.php');

} else if(isset($_SESSION['user'])) {

	include('../admins/navi.php');
	include('../admins/db.php');
}
include('OrderModel.php');

$order_id = $_GET['id'];
$arr = getOrderDetail($order_id);

$alltotal = 0;
?>
<div style="width: 1180px; height: auto; justify-content: center; display:flex; flex-wrap: wrap;">
	<table style="width:100%">
		<tr>
			<td>OrderID</td>
			<td>Item</td>
			<td>Qty</td>
			<td>Price</td>
			<td>Total</td>						
		</tr>
		<?php foreach($arr as $o) : ?>
			<tr>
				<td><?php echo $o['orders_id']; ?></td>
				<td><?php echo $o['title']; ?></td>
				<td><?php echo $o['qty']; ?></td>
				<td><?php echo $o['orderprice']; ?></td>
				<td><?php echo $o['qty'] * $o['orderprice']; ?></td>
			</tr>
		<?php $alltotal += ($o['qty'] * $o['orderprice']); ?>
		<?php endforeach; ?>
	</table>
	Total = <?php echo $alltotal; ?>

</div>
