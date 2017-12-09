<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/code/group_three/php/login.php';
require_once 'User.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_End
<html><body>
<form action='loginscreen.php' method='post'><br>
<pre>
Username: <input type='text' name='username'><br>
 Password : <input type='password' name='password'><br>
<input type='submit' name='Submit'>
<input type='hidden' value='login'>
</pre>
</form>
</body></html>
_End;
error_log("My first php error  coming from my hjfsjh");
if (isset($_POST['username']) && isset($_POST['password'])) {

	$un_temp = mysql_entities_fix_string($conn, $_POST['username']);
	$pw_temp = mysql_entities_fix_string($conn, $_POST['password']);


	$query = "SELECT * from user where username='$un_temp' ";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	elseif($result->num_rows){
		$row = $result->fetch_array(MYSQLI_NUM);
		$correct_pw = $row[4];
		//echo"$correct_pw";
		
		$name = $row[2];
		$username=$row[1];
		$result->close();	
		
		$salt1 = 'fue@312!@#%';
		$salt2 = '&$21%d34weqo';
		$token = hash('ripemd128', "$salt1$pw_temp$salt2" );
		
		if($token == $correct_pw){
			//echo "Hi $name you are now logged in as $username";
			
			$user = new User($un_temp);
			$_SESSION['username'] = $user;
			
			//print_r($user->getRoles());
			
			header("Location: ../HomePage.php");
		}else{
			echo 'Please check your password.';
		}		
	}else{
		exit();
	}	
		
}else{
	exit();
}

$conn->close();


function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>



