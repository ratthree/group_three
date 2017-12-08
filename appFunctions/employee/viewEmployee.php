<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
	<pre>
	<a href="addEmployee.php">Add Employee</a>
	
_END;

$query="SELECT * FROM employee";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_NUM);
	
	echo <<<_END
	<pre>
		Employee ID: $row[0];
		Title: $row[1];
		Name: $row[2] $row[3];
		Address: $row[4], $row[5], $row[6], $row[7];
		Type: $row[8];
		Years of Employment: $row[9];
		Team ID: $row[10];
	</pre>
	<form action="deleteEmployee.php" method="post">
	<input type="hidden" name="delete" value="yes">
	<input type="hidden" name="eid" value="$row[0]">
	<input type="submit" value="DELETE Employee">
	</form>
_END;
}

$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}



?>