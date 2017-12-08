<?php

require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
	<pre>
	<a href="addEvent.php">Add Event</a>
	
_END;

$query="SELECT * FROM event";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_NUM);
	
	echo <<<_END
	<pre>
		Event ID： $row[0];
		Income： $row[1];
		Event Date： $row[2];
		Opposing Team： $row[3];
		Attendance： $row[4];
		Team ID： $row[5];
		Venue ID： $row[6];
	</pre>
	<form action="deleteEvent.php" method="post">
	<input type="hidden" name="delete" value="yes">
	<input type="hidden" name="evid" value="$row[0]">
	<input type="submit" value="DELETE EVENT">
	</form>
_END;
}

$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}



?>