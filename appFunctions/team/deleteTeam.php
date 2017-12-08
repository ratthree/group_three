<?php

require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']) && isset($_POST['tid'])) {
	$tid=get_post($conn, 'tid');
	$query="DELETE FROM team WHERE id='$tid'";
	$result=$conn->query($query);
	if(!$result) echo "DELETE failed: $query <br>" .
	$conn->error . "<br><br>";
	
	echo <<<_END
	<pre>Delete Team with ID: $tid was successful</pre>
	</br></br>
	<a href="viewTeam.php">View all Teams</a>
_END;
}

//$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>