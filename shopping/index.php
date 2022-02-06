<?php
include('header.php');
include('admins/item/itemModels.php');
[$latestItems, $latestTotal] = getitems(6);
[$catItems1, $cat1total] = getItemsByCategory(12, 6);
[$catItems2, $cat2total] = getItemsByCategory(13, 6);

?>
<!-- Banner -->
<img src="imgs/nva.png" style="width:100%" />

<!-- New Products Section -->
<div style="width: 1180px; height: auto; justify-content: center; display:flex; flex-wrap: wrap;">

	<h1 style="width:100%; text-align: left; padding-left: 20px">New Products</h1>

	<?php foreach($latestItems as $i): ?>
		<div style="width:30%; height: 200px; padding: 10px; background: cyan;">
			<div style="width:100%; background: gray; height:90%">
				<img style="width: 100%; height: 100%" src="uploads/<?php echo ($i['photo_name']) ?: 'noimage.jpg'; ?>" />
				<!-- ($i['photo_name']) ?: 'noimage.jpg'; -->
				<!-- if ($i['photo_name'] != '') { 
						echo $i['photo_name'];
				     } else {
						echo 'noimage.jpg';
				     }
				-->
			</div>
			<span><?php echo $i['title']; ?></span>
			<b>(<?php echo number_format($i['price']); ?> MMK)</b>
		</div>
	<?php endforeach; ?>
</div>

<!-- Cat1 Products Section -->
<div style="width: 1180px; height: auto; justify-content: center; display:flex; flex-wrap: wrap;">

	<h1 style="width:100%; text-align: left; padding-left: 20px">Cat1</h1>
	<?php foreach($catItems1 as $ci1): ?>
		<div style="width:30%; height: 200px; padding: 10px; background: cyan;">
			<div style="width:100%; background: gray; height:90%">
				<img style="width: 100%; height: 100%" src="uploads/<?php echo $ci1['photo_name'] ?: 'noimage.jpg'; ?>" />
			</div>
			<span><?php echo $ci1['title']; ?></span>
			<b>(<?php echo number_format($ci1['price']); ?>)</b>
		</div>
	<?php endforeach; ?>
</div>

<!-- Cat2 Products Section -->
<div style="width: 1180px; height: auto; justify-content: center; display:flex; flex-wrap: wrap;">

	<h1 style="width:100%; text-align: left; padding-left: 20px">Cat2</h1>
	<?php foreach($catItems2 as $ci2): ?>
		<div style="width:30%; height: 200px; padding: 10px; background: cyan;">
			<div style="width:100%; background: gray; height:90%">
				<img style="width: 100%; height: 100%" src="uploads/<?php echo $ci2['photo_name'] ?: 'noimage.jpg'; ?>" />
			</div>
			<span><?php echo $ci2['title']; ?></span>
			<b>(<?php echo number_format($ci2['price']); ?>)</b>
		</div>
	<?php endforeach; ?>					
</div>


<?php include('footer.php'); ?>