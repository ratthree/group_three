<?php

session_start(); //this must be used every time you want to use the session. Even to end it. 


if(isset($_SESSION['username']))
{
	$_SESSION = array();
	setCookie(session_name(), '', time()-2592000, '/');
	session_destroy();
	
		echo "user successfully logged out";
}





?>