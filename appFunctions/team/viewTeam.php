<?php

require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
	<pre>
	<a href="addTeam.php">Add Team</a>
	
_END;

$query="SELECT * FROM team";
$result=$conn->query($query);
if(!$result) die ($conn->error);

$rows=$result->num_rows;
for($j=0; $j<$rows; $j++) {
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_NUM);
	
	echo <<<_END
	<pre>
		Team ID： $row[0];
		Type： $row[1];
		Rank： $row[2];
		Record： $row[3];
		Date of Start： $row[4];
		Date of End： $row[5];
	</pre>
	<form action="deleteTeam.php" method="post">
	<input type="hidden" name="delete" value="yes">
	<input type="hidden" name="tid" value="$row[0]">
	<input type="submit" value="DELETE TEAM">
	</form>
_END;
}

$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}



?>