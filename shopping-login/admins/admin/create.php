<?php

session_start();
include('../baseurl.php');

if( !isset($_SESSION['user']) ) {
	$url = str_replace('http://localhost', '', $baseUrl);
	header("Location: ${url}login/");	
}

include('../adminnav.php');
include('AdminModel.php');

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

	if (count($err) == 0) {

		$row = getAdminByEmail($_POST['email']);
		if ($row == NULL) {
			$result = insertAdmin($_POST);
			if ($result == true) {
				header('Location: index.php');
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


<h1>Admin Create</h1>

<?php foreach($err as $e) : ?>
	<p style="background: red"><?php echo $e['error']; ?></p>
<?php endforeach; ?>	

<form action="" method="POST">
	Name : <input type="text" name="name" >
	Email : <input type="email" name="email" >
	Password : <input type="password" name="password" >
	<button name="add">Add</button>
</form>