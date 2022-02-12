<?php
include('header.php');
include('customer/CustomerModel.php');

$err = [];
if (isset($_POST['add'])) {
	if ($_POST['name'] == '') {
		array_push($err, [
			'field' => 'name',
			'error' => 'Name is required'
		]);
	}
	if ($_POST['email'] == '') {
		array_push($err, [
			'field' => 'email',
			'error' => 'email is required'
		]);
	}
	if ($_POST['password'] == '') {
		array_push($err, [
			'field' => 'password',
			'error' => 'password is required'
		]);
	}
	if ($_POST['address'] == '') {
		array_push($err, [
			'field' => 'address',
			'error' => 'address is required'
		]);
	}

	if (count($err) == 0) {		
		$row = getCustomerByEmail($_POST['email']);
		if ($row == NULL) {
			$result = insertCustomer($_POST);
			if ($result == true) {
				$user = login($_POST);	
				
				$_SESSION['login_user'] = $user;
				$_SESSION['login_user_time'] = date('Y-m-d H:m:s');

				$redirect = 'customer/order.php';
				if (isset($_GET['redirect'])) {
					$redirect = $_GET['redirect'];
				}

				header('Location: '.$redirect);				
			}
		} else {
			array_push($err, [
				'field' => 'email',
				'error' => 'email is duplicated'
			]);
		}
	}
}

?>


<h1>User Register</h1>

<?php foreach($err as $e) : ?>
	<p style="background: red"><?php echo $e['error']; ?></p>
<?php endforeach; ?>	

<form action="" method="POST">
	Name : <input type="text" name="name" ><br>
	Email : <input type="email" name="email" ><br>
	Password : <input type="password" name="password" ><br>
	Address : <textarea name="address"></textarea><br>
	<button name="add">Add</button>
</form>