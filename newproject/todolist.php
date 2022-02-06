<?php

include('nav.php');

$arr = [];

if (isset($_POST['add'])) {

	if (isset($_POST['old'])) {
		$oldtodos = $_POST['old'];
		foreach ($oldtodos as $old) {
			array_push($arr, $old);
		}
	}

	$todo = $_POST['todo'];
	array_push($arr, $todo);
}

if (isset($_POST['update'])) {
	if (isset($_POST['old'])) {
		$oldtodos = $_POST['old'];
		foreach ($oldtodos as $old) {
			array_push($arr, $old);
		}
	}	
	// echo '<pre>';
	// var_dump($arr);
	// echo '</pre>';
	$todoupdate = $_POST['todoupdate'];
	$key = $_POST['todoupdate-key'];
	// echo $todoupdate;
	// echo '<br>';
	// echo $key;

	$arr[$key] = $todoupdate;
}

if (isset($_POST['delete'])) {
	$key = $_POST['delete'];
	// echo $key;

	if (isset($_POST['old'])) {
		$oldtodos = $_POST['old'];
		foreach ($oldtodos as $old) {
			array_push($arr, $old);
		}
	}

	// echo '<pre>';
	// var_dump($arr);
	// echo '</pre>';

	array_splice($arr, $key, 1);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>To Do List</title>
</head>
<body>
	<h1>To Do List</h1>
	<form action="" method="POST">
		<ul>
			<?php
			foreach ($arr as $key => $a) { ?>
				<li>
					<?php echo $a; ?> 
					<button type="button" onclick="edit('<?php echo $a; ?>', '<?php echo $key; ?>')">Edit</button>	
					<button name="delete" value="<?php echo $key; ?>">Delete</button>
				</li> <?php
			}
			?>
		</ul>
	
		<input type="text" name="todo">
		<?php 
		foreach ($arr as $key => $value) { ?>			
			<input type="hidden" name="old[<?php echo $key; ?>]" value="<?php echo $value; ?>" /><?php 
		} 
		?>
		<button name="add">Add</button>

		<br>
		<input type="text" name="todoupdate" style="display: none; background: yellow;">
		<input type="hidden" name="todoupdate-key">
		<button name="update" style="display: none;">Update</button>
	</form>
	<script type="text/javascript">
		function edit(todo, key) {
			// alert('edit');
			// alert(todo);
			// alert(key);

			var todotextbox = document.querySelector('input[name=todo]');
			todotextbox.style.display = 'none';

			var addbtn = document.querySelector('button[name=add]');
			addbtn.style.display = 'none';

			var updatebtn = document.querySelector('button[name=update]');
			updatebtn.style.display = 'block';

			var todoupdatetxt = document.querySelector('input[name=todoupdate]');
			todoupdatetxt.style.display = 'block';
			todoupdatetxt.value = todo;

			document.querySelector('input[name=todoupdate-key').value = key
		}	
	</script>
</body>
</html>