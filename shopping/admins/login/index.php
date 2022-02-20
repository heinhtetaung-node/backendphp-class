<?php
session_start();
require_once(__DIR__.'\../admin/AdminModel.php');
require_once(__DIR__.'\../baseurl.php');
$user = '';
if (isset($_POST['login'])) {
	$user = login($_POST);	
	if ($user != NULL) {
		$_SESSION['user'] = $user;
		$_SESSION['login_time'] = date('Y-m-d H:m:s');
		header("Location: ${baseUrl}index.php");
	}
}

?>
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