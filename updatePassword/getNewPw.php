<?php

require_once '../login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
			
echo <<<_END
<form action="getNewPw.php" method="post"<pre>
			What is your Username?: <input type="text" name="username"></br></br>
			What is your PREVIOUS password?: <input type='text' name='ppw'></br></br>
			What is your NEW password?: <input type='text' name='npw'></br></br>
	<input type="submit" name="COMFIRM">
	</br></br>
</pre></form>
_END;

$salt1 = 'fue@312!@#%';
$salt2 = '&$21%d34weqo';

if(isset($_POST['username'])) 
		{
		$username = get_post($conn, 'username');
		$ppw = get_post($conn, 'ppw');
		$npw = get_post($conn, 'npw');
		$token = hash('ripemd128',"$salt1$npw$salt2");
		
		$query = "UPDATE user SET password='$token' WHERE username='$username' AND password='$ppw'";
		$result=$conn->query($query);
		if(!$result) echo "UPDATE failed: $query <br>" .
			$conn->error . "<br><br>";
		
	//$result->close();	
}
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>