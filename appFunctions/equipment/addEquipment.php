<?php

require_once '../login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form action="addEquipment.php" method="post"<pre>
			Equipment ID:<input type="text" name="eqid"></br></br>
			Equipment Type:<input type='text' name='etype'></br></br>
			Yearly Cost:<input type='text' name='yrc'></br></br>			
			Year:<input type='text' name='yr'></br></br>

	<input type="submit" name="ADD Equipment">
	</br></br>
	<a href="viewEquipment.php" >View all Equipments</a>
</pre></form>
_END;

if(isset($_POST['eqid'])) 
		{
		$eqid = get_post($conn, 'eqid');
		$etype = get_post($conn, 'etype');
		$yrc = get_post($conn, 'yrc');
		$yr = get_post($conn, 'yr');

		$query = "insert into equipment (equipment_type, yearly_cost, year) values ('$etype', '$yrc', '$yr')";
		$result=$conn->query($query);
		if(!$result) echo "INSERT failed: $query <br>" .
			$conn->error . "<br><br>";
	
	//$result->close();
	
}

$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>