<?php

require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']) && isset($_POST['eqid'])) {
	$eqid=get_post($conn, 'eqid');
	$query="DELETE FROM equipment WHERE id='$eqid'";
	$result=$conn->query($query);
	if(!$result) echo "DELETE failed: $query <br>" .
	$conn->error . "<br><br>";
	
	echo <<<_END
	<pre>Delete Equipment with ID: $eqid was successful</pre>
	</br></br>
	<a href="viewEquipment.php">View all Equipments</a>
_END;
}

//$result->close();
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}


?>