<?php

require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
	<pre>
	<a href="addEquipment.php">Add Equipment</a><br></br>
	<a href="homepage.php">Back to Home Page</a><br></br>
	
_END;

$query="SELECT * FROM equipment";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_NUM);
	
	echo <<<_END
	<pre>
		Equipment ID： $row[0];
		Equipment Type： $row[1];
		Yearly Cost： $row[2];
		Year： $row[3];

	</pre>
	<form action="deleteEquipment.php" method="post">
	<input type="hidden" name="delete" value="yes">
	<input type="hidden" name="eqid" value="$row[0]">
	<input type="submit" value="DELETE EQUIPMENT">
	</form>
_END;
}

$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}



?>