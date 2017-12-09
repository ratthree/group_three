<?php

//Example 12-6

require_once 'User.php';

$pageRoles = array('admin');

session_start();

if(isset($_SESSION['username']))
{
	$user = $_SESSION['username'];
	$username = $user->username;
	$password = $_SESSION['password'];
	
	$roles = $user->getRoles();
	
	$found=0;
	foreach($pageRoles as $prole){
		foreach($roles as $role){
			if($role==$prole){
				$found=1;
			}		
		}		
	}
	//echo $found.'<br>';
	if(!$found) header("Location: unauthorized.php");
	
	// destroy_session_and_data();
	
	
	
	echo "Welcome back $username with $password<br>";
}else{
	echo "Error -- user not in session";
}


function destroy_session_and_data()
{
	$_SESSION = array(); //or $_SESSION = null; this makes the session array blank
	setCookie(session_name(), '', time()-2592000, '/');
	session_destroy(); //iffy, it may not always work
}



?>