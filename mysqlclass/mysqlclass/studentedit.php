<?php

include("nav.php");

include("db.php"); /* containing $db */

echo '<h1>Student </h1>';

$id = $_GET['id'];

function getStudent($id, $db) {
	$sql = "SELECT * FROM student WHERE id='$id'";
	$result = $db->query($sql);
	$row = $result->fetch_assoc(); // return associative array
	return $row;
}

function updateStudent($student, $id, $db) {
	$sql = "UPDATE student SET name='${student['stuname']}', age='${student['age']}', course='${student['course']}' WHERE id='$id' ";
	$result = $db->query($sql);
	if ($result != true) {
		echo 'something wrong';
	} else {
		header('Location: studentcrud.php');	
	}
}

$student = getStudent($id, $db);

if (isset($_POST['update'])) {
	updateStudent($_POST, $id, $db);	
}

?>

<form action="studentedit.php?id=<?php echo $id; ?>" method="POST">
	<div style="padding:20px; border:1px solid black" id="insert-form">
		Name <input type="text" name="stuname" value="<?php echo $student['name']; ?>" /> <br/>
		Age <input type="text" name="age" value="<?php echo $student['age']; ?>" /> <br/>
		Course 
		<select name="course"> 
			<option <?php if ($student['course'] == 'Php') { echo 'selected'; } ?>  >Php</option>
			<option <?php if ($student['course'] == 'Javascript') { echo 'selected'; } ?>  >Javascript</option>
			<option <?php if ($student['course'] == 'Laravel') { echo 'selected'; } ?>  >Laravel</option>
			<option <?php if ($student['course'] == 'React') { echo 'selected'; } ?>  >React</option>
		</select>
		<br/>
		<button name="update">Update</button>
	</div>
</form>

