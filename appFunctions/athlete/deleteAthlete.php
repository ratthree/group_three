<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']) && isset($_POST['isbn'])) {
	$id=get_post($conn, 'id');
	$query="DELETE FROM athlete WHERE id='$id'";
	$result=$conn->query($query);
	if(!$result) echo "DELETE failed: $query <br>" .
	$conn->error . "<br><br>";
	
	echo <<<_END
	<pre>Delete Athlete with ID: $id was successful</pre>
	</br></br>
	<a href="viewAthlete.php">View all Athletes</a>
_END;
}

//$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>