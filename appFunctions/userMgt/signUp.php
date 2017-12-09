<?php

require_once '../login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
			
echo <<<_END
<form action="signUp.php" method="post"<pre>
			Username:<input type="text" name="un"></br></br>
			First Name:<input type='text' name='fn'></br></br>
			Last Name:<input type='text' name='ln'></br></br>
			Password:<input type='text' name='pw'></br></br>

	<input type="submit" name="SIGN UP">
	</br></br>
	<a href="../HomePage.HTML" >Back To Home Page</a>
</pre></form>
_END;


if(isset($_POST['un'])) 
		{
		$un = get_post($conn, 'un');
		$fn = get_post($conn, 'fn');
		$ln = get_post($conn, 'ln');
		$pw = get_post($conn, 'pw');
		
		$role = 'customer';
		$salt1 = 'fue@312!@#%';
		$salt2 = '&$21%d34weqo';
		$token = hash('ripemd128',"$salt1$pw$salt2");
	
		$query = "insert into user (username, fname, lname, role, password) values ('$un', '$fn', '$ln', '$role', '$token')";
		
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