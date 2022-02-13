<h1>Customer Order Page</h1>

<div style="width: 1180px; height: auto; justify-content: center; display:flex; flex-wrap: wrap;">
	<input type="text" name="search"><button>Search</button>
	<table style="width:100%">
		<tr>
			<td>OrderID</td>
			<td>Customer</td>
			<td>Total</td>
			<td>Date</td>
			<td></td>
		</tr>
		<?php foreach($orders as $o) : ?>
			<tr>
				<td><?php echo $o['id']; ?></td>
				<td><?php echo $o['cusname']; ?></td>
				<td><?php echo $o['total']; ?></td>
				<td><?php echo $o['ordertime']; ?></td>
				<td><a href="<?php echo (strpos($baseUrl,"admins"))? str_replace('/admins', '', $baseUrl) : $baseUrl; ?>customer/orderdetail.php?id=<?php echo $o['id']; ?>"><button>Detail</button></a></td>
			</tr>
		<?php endforeach; ?>
	</table>

</div>