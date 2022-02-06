<?php
include('header.php');
include('admins/item/itemModels.php');
$category_id = $_GET['cat'];
[$catItems1, $cat1total] = getItemsByCategory($category_id, 10);
?>

<!-- Cat1 Products Section -->
<div style="width: 1180px; height: auto; justify-content: center; display:flex; flex-wrap: wrap;">

	<h1 style="width:100%; text-align: left; padding-left: 20px"></h1>
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

<?php include('footer.php'); ?>