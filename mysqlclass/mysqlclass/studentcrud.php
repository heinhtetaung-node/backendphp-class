<?php
include("nav.php");

include("db.php");

function getStudents($db) {
	$sql = "SELECT * FROM student";
	$result = $db->query($sql);
	$arr = $result->fetch_all(MYSQLI_ASSOC);
	return $arr;
}

function insertStudent($db) {
	// var_dump($_POST);
	$name = $_POST['stuname'];
	$age = $_POST['age'];
	$course = $_POST['course'];
	$sql = "INSERT INTO student (name, age, course) VALUES ('$name', '$age', '$course')";
	$result = $db->query($sql);
	if ($result != true) {
		echo 'something wrong';
	}
}

function deleteStudent($id, $db) {
	$sql = "DELETE FROM student WHERE id = '$id'";
	$result = $db->query($sql);
	if ($result != true) {
		echo 'something wrong';
	}
}

if (isset($_POST['add'])) {
	insertStudent($db);
}

if (isset($_POST['delete'])) {
	$id = $_POST['delete'];
	deleteStudent($id, $db);
}

$arr = getStudents($db);

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
						<a href="studentedit.php?id=<?php echo $stu['id']; ?>">  <!-- data carry from query string / GET method -->
							<button type="button">
								Edit
							</button>
						</a>
						<button name="delete" value="<?php echo $stu['id']; ?>">Delete</button>
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
	</form>	
</body>
</html>