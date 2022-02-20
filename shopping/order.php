<?php
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/admins/item/itemModels.php');
require_once(__DIR__.'/customer/OrderModel.php');

if (isset($_POST['pay'])) {
	// check validation later

	// check this card 2c2p 
	// send card information to 2c2p with api 
	// if true, redirect to otp code | false show error message
	// if true, return to this page | false show error message

	// save to order 
	// insert
	$res = insertOrder();
	if ($res == true) {
		unset($_SESSION['products']);
		header('Location: customer/order.php');
	}
}
?>
<form action="" method="POST">
	Master / Visa <input type="text" name="card">
	<br>
	Exipry <select name="year">
		<?php for($i = 2022; $i < 2030; $i++) { ?>
			<option><?php echo $i; ?></option>
			<?php
		}
		?>
	</select>

	<select name="month">
		<?php for($i = 1; $i < 13; $i++) { ?>
			<option><?php echo $i; ?></option>
			<?php
		}
		?>
	</select>
	<br>
	CVV code <input type="number" name="cvv">
	<button name="pay">Pay</button>
</form>