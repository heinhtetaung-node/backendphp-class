<?php 
include('../admin_session.php');
include('../navi.php');
include('StockModel.php');

[$stocks, $total] = getStocks();
?>

<h1>Stock</h1>

<table style="width:100%">
	<tr>
		<th>ID</th>
		<th>Item</th>
		<th>Qty</th>
		<th></th>
	</tr>
	<a href="create.php"><button>Add Stock</button></a>
	<?php foreach($stocks as $stock): ?>
		<tr>
			<td style="border: 1px solid black; padding: 7px"><?php echo $stock['id']; ?></td>
			<td style="border: 1px solid black; padding: 7px"><?php echo $stock['itemname']; ?></td>
			<td style="border: 1px solid black; padding: 7px"><?php echo $stock['quantity']; ?></td>
			<td style="border: 1px solid black; padding: 7px">
				<a href="edit.php?id=<?php echo $stock['item_id']; ?>">
					<button>Damage Stock</button>
				</a>
			</td>			
		</tr>
	<?php endforeach; ?>
</table>
