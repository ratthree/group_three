<?php

require_once 'login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
			// Employee ID:<input type="text" name="eid"></br></br>
			// Team ID:<input type='text' name='tid'></br></br>
echo <<<_END
<form action="addEmployee.php" method="post"<pre>

			Title:<input type='text' name='title'></br></br>
			First Name:<input type='text' name='fname'></br></br>
			Last Name:<input type='text' name='lname'></br></br>
			Street:<input type='text' name='street'></br></br>
			City:<input type='text' name='city'></br></br>
			State:<input type='text' name='state'></br></br>
			Zip:<input type='text' name='zip'></br></br>
			Type:<input type='text' name='type'></br></br>
			Years of Employment:<input type='text' name='yre'></br></br>	
	<input type="submit" name="ADD EMPLOYEE">
	</br></br>
	<a href="viewEmployee.php" >View all Employees</a>
</pre></form>
_END;

if(isset($_POST['eid'])) 
		{
		// $eid = get_post($conn, 'eid');
		$title = get_post($conn, 'title');		
		$fname = get_post($conn, 'fname');
		$lname = get_post($conn, 'lname');
		$street = get_post($conn, 'street');
		$city = get_post($conn, 'city');
		$state = get_post($conn, 'state');
		$zip = get_post($conn, 'zip');
		$type = get_post($conn, 'type');
		$yre = get_post($conn, 'yre');
		// $tid = get_post($conn, 'tid');

		//$query = "insert into employee (id, title, fname, lname, street_address, city_address, state_address, zip_address, type, years_employed, team_id) values ('$eid', '$title', '$fname', '$lname', '$street', '$city', '$state', '$zip', '$type', '$yre', '$tid')";
		
		$query = "insert into employee (title, fname, lname, street_address, city_address, state_address, zip_address, type, years_employed) values ('$title', '$fname', '$lname', '$street', '$city', '$state', '$zip', '$type', '$yre')";
		
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