<?php
include("nav.php");

$arr = [
	// [
	// 	"name" => "hein",
	// 	"age" => 28,
	// 	"course" => 'PHP'
	// ],
	// [
	// 	"name" => "htet",
	// 	"age" => 28,
	// 	"course" => 'PHP'
	// ],
	// [
	// 	"name" => "aung",
	// 	"age" => 28,
	// 	"course" => 'PHP'
	// ]
];
 
if (isset($_POST['add'])) {
	$name = $_POST['stuname'];
	$age = $_POST['age'];
	$course = $_POST['course'];
	
	if (isset($_POST['old'])) {
		// echo '<pre>';
		// var_dump($_POST['old']);
		// echo '</pre>';

		$olds = $_POST['old'];

		foreach($olds as $key => $old) {
			array_push($arr, $old);
		}
	}


	array_push($arr, [
		'name' => $name,
		'age' => $age,
		'course' => $course
	]);
}

if (isset($_POST['update'])) {
	if (isset($_POST['old'])) {		
		$olds = $_POST['old'];
		foreach($olds as $key => $old) {
			array_push($arr, $old);
		}
	}

	$name = $_POST['stuname-upd'];
	$age = $_POST['age-upd'];
	$course = $_POST['course-upd'];
	$key = $_POST['key-upd'];

	// echo '<pre>';
	// var_dump($arr);
	// echo '</pre>';

	// echo $name; 
	// echo '<br>';
	// echo $age; 
	// echo '<br>';
	// echo $course; 
	// echo '<br>';
	// echo $key; 
	// echo '<br>';

	$arr[$key]['name'] = $name;
	$arr[$key]['age'] = $age;
	$arr[$key]['course'] = $course;	
}

// echo '<pre>';
// var_dump($arr);
// echo '</pre>';

if (isset($_POST['delete'])) {
	if (isset($_POST['old'])) {		
		$olds = $_POST['old'];
		foreach($olds as $key => $old) {
			array_push($arr, $old);
		}
	}

	$key = $_POST['delete'];

	array_splice($arr, $key, 1);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Registeration</title>
</head>
<body>
	<h1>Student Registeration</h1>
	<form action="" method="POST">
		<table>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Course</th>
				<th></th>
			</tr>

			<?php
			foreach ($arr as $key => $stu) { ?>
				<tr>
					<td><?php echo $stu['name']; ?></td>
					<td><?php echo $stu['age']; ?></td>
					<td><?php echo $stu['course']; ?></td>
					<td>
						<button type="button" onclick="edit('<?php echo $stu['name']; ?>', '<?php echo $stu['age']; ?>', '<?php echo $stu['course']; ?>', '<?php echo $key; ?>')">
							Edit
						</button>
						<button name="delete" value="<?php echo $key; ?>">Delete</button>
					</td>
				</tr><?php
			} ?>
		</table>
		<hr>

		<div style="padding:20px; border:1px solid black" id="insert-form">
			Name <input type="text" name="stuname" /> <br/>
			Age <input type="text" name="age" /> <br/>
			Course 
			<select name="course"> 
				<option>Php</option>
				<option>Javascript</option>
				<option>Laravel</option>
				<option>React</option>
			</select>
			<br/>
			<button name="add">Add</button>
		</div>
		<br />
		<div style="padding:20px; border:1px solid black; display: none;" id="update-form">
			Name <input type="text" name="stuname-upd" /> <br/>
			Age <input type="text" name="age-upd" /> <br/>
			Course 
			<select name="course-upd"> 
				<option>Php</option>
				<option>Javascript</option>
				<option>Laravel</option>
				<option>React</option>
			</select>
			<br/>
			<input type="hidden" name="key-upd" />
			<button name="update">Update</button>
		</div>


		<?php
		foreach ($arr as $key => $stu) { ?>

			<input type="hidden" name="old[<?php echo $key; ?>][name]" value="<?php echo $stu['name']; ?>">
			<input type="hidden" name="old[<?php echo $key; ?>][age]" value="<?php echo $stu['age']; ?>">
			<input type="hidden" name="old[<?php echo $key; ?>][course]" value="<?php echo $stu['course']; ?>">
			<?php
		} ?>		
	</form>
	<script type="text/javascript">
		function edit (name, age, course, key) {
			var insertForm = document.getElementById('insert-form')
			var updateForm = document.getElementById('update-form')
			insertForm.style.display = 'none';
			updateForm.style.display = 'block';
			var nametxt = document.querySelector('input[name=stuname-upd]')
			var agetxt = document.querySelector('input[name=age-upd]')
			var coursesel = document.querySelector('select[name=course-upd]')
			var keytxt = document.querySelector('input[name=key-upd]')

			nametxt.value = name;
			agetxt.value = age;
			coursesel.value = course
			keytxt.value = key;
		}
	</script>
</body>
</html>