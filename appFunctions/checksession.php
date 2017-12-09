<?php

require_once 'User.php';

session_start();

if(!isset($_SESSION['username']))//if the username is NOT in session
{
	header("Location: ../loginscreen.php");
	exit();
}else{  //user is in session
	$user = $_SESSION['username'];
	$roles = $user->getRoles();
	//echo "hello<br>";
	//print_r($roles);	
	
	$found=0;
	foreach($page_roles as $prole){
		foreach($roles as $role){
			if($role==$prole){
				$found=1;
			}		
		}		
	}
	//echo $found.'<br>';
	if(!$found) header("Location: unauthorized.php");
	}




?>