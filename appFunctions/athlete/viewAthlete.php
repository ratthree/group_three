<?php

require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
	<pre>
	<a href="addAthlete.php">Add Athlete</a>
_END;

$query="SELECT * FROM athlete";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_NUM);
	
	echo <<<_END
	<pre>
		Player ID： $row[0];
		Name： $row[1] $row[2];
		Position： $row[3];
		Academic Level： $row[4];
		Current Address： $row[5], $row[6], $row[7], $row[8];
		Hometown： $row[9], $row[10], $row[11], $row[12];
		Phone Number： $row[13];
		Team ID： $row[14];
	</pre>
	<form action="deleteAthlete.php" method="post">
	<input type="hidden" name="delete" value="yes">
	<input type="hidden" name="id" value="$row[0]">
	<input type="submit" value="DELETE ATHLETE">
	</form>
_END;
}

$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}



?>