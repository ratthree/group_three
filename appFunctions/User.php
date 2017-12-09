<?php

class User{
	
	public $username;
	public $roles = Array();
	
	function __construct($username){						
		$this->username = $username;				
	}
	
	function setRoles($roles){
		$this->roles = $roles;
	}

	function getRoles(){
		return $this->roles;
	}
	
}


















?>