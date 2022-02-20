<?php

require_once(__DIR__.'/header.php');
require_once(__DIR__.'/customer/CustomerModel.php');

$redirect = '';
if (isset($_GET['redirect'])) {
	$redirect = $_GET['redirect'];
}

$user = '';
if (isset($_POST['login'])) {
	$user = login($_POST);	
	if ($user != NULL) {
		$_SESSION['login_user'] = $user;
		$_SESSION['login_user_time'] = date('Y-m-d H:m:s');

		$redirect = 'customer/order.php';
		if (isset($_GET['redirect'])) {
			$redirect = $_GET['redirect'];
		}

		header('Location: '.$redirect);
	}
}

?>

<br /><br />
<form action="" method="POST">

	<?php if ($user === NULL) : ?>
		<p style="background: orangered;">User name password is not match!</p>
	<?php endif; ?>
	Email : <input type="email" name="email">
	<br>
	Password :
	<input type="password" name="password">
	<br>
	<button name="login">Login</button>
</form>

<a href="register.php?redirect=<?php echo $redirect; ?>">Don't have an account? Please Register</a>