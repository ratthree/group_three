<?php

require_once 'login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form action="addAthlete.php" method="post"<pre>
			Player ID:<input type="text" name="id"></br></br>
			Team ID:<input type='text' name='tid'></br></br>	
			First Name:<input type='text' name='fname'></br></br>
			Last Name:<input type='text' name='lname'></br></br>
			Position:<input type='text' name='position'></br></br>
			Academic Level:<input type='text' name='al'></br></br>
			Current Street:<input type='text' name='strc'></br></br>
			Current City:<input type='text' name='cc'></br></br>
			Current State:<input type='text' name='sc'></br></br>
			Current Zip:<input type='text' name='zc'></br></br>
			Hometown Street:<input type='text' name='strh'></br></br>
			Hometown City:<input type='text' name='ch'></br></br>
			Hometown State:<input type='text' name='sh'></br></br>
			Hometown Zip:<input type='text' name='zh'></br></br>
			Phone:<input type='text' name='phone'></br></br>

	<input type="submit" name="ADD ATHLETE">
	</br></br>
	<a href="viewAthlete.php" >View all Athletes</a>
</pre></form>
_END;


if(isset($_POST['id'])) 
		{
		$id = get_post($conn, 'id');
		$fname = get_post($conn, 'fname');
		$lname = get_post($conn, 'lname');
		$position = get_post($conn, 'position');
		$al = get_post($conn, 'al');
		$strc = get_post($conn, 'strc');
		$cc = get_post($conn, 'cc');
		$sc = get_post($conn, 'sc');
		$zc = get_post($conn, 'zc');
		$strh = get_post($conn, 'strh');
		$ch = get_post($conn, 'ch');
		$sh = get_post($conn, 'sh');
		$zh = get_post($conn, 'zh');
		$phone = get_post($conn, 'phone');
		$tid = get_post($conn, 'tid');

		$query = "insert into athlete (id, fname, lname, position, academic_level, street_current, city_current, state_current, zip_current, street_hometown, city_hometown, state_hometown, zip_hometown, phone, team_id) values ('$id', '$fname', '$lname', '$position', '$al', '$strc', '$cc', '$sc', '$zc', '$strh', '$ch', '$sh', '$zh', '$phone', '$tid')";
		
		//$query = "insert into athlete (fname, lname, position, academic_level, street_current, city_current, state_current, zip_current, street_hometown, city_hometown, state_hometown, zip_hometown, phone) values ('$fname', '$lname', '$position', '$al', '$strc', '$cc', '$sc', '$zc', '$strh', '$ch', '$sh', '$zh', '$phone')";
		
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