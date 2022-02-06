<?php
session_start();
if (isset($_POST['clear'])) {
	unset($_SESSION['products']);
}
include('baseUrl.php');
include('admins/db.php');
include('admins/category/ctgmodels.php');
[$cats, $catsTotal] = getcategories(10, 0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shopping </title>
</head>
<body style="margin: 0px auto;">
	<div style="background:; width:100%; height: 100vh; margin: 0px auto; display: flex; align-items: center; flex-direction: column;">
		
		<!-- Logo -->
		<div style="width: 1180px; height: 100px; display:flex; align-items: center; justify-content: space-between;">
			<h1>Shopping</h1>
			<div style="width: 400px; display: flex; justify-content: space-around;">
				<input type="text" style="height: 30px; margin-top:20px">
				<h3>My account</h3>
				<h3>Cart
				<?php
					$totalQty = 0;
					if (isset($_SESSION['products'])) {
						$products = $_SESSION['products'];
						foreach ($products as $p) {
							// $totalQty = $totalQty + $p['qty'];
							$totalQty += $p['qty'];
						}
					}
					if ($totalQty > 0) {
						echo '('.$totalQty.')';
					}
				?>
				<form action="" method="POST"><button name="clear" type="submit">Clear Cart</a></button></form>
				</h3>
			</div>
		</div>		
		
		<!-- Nav -->
		<div style="background: yellow; width:100%; height: 50px; margin: 0px auto; display: flex; justify-content: center;">
			<div style="background: pink; width: 1180px; height: 50px; display:flex; align-items: center;">
				<a style="padding:15px" href="index.php">Home</a>
				<?php foreach($cats as $c): ?>
					<a style="padding: 15px;" href="items.php?cat=<?php echo $c['id']; ?>"><?php echo $c['title']; ?></a>
				<?php endforeach; ?>
			</div>			
		</div>
