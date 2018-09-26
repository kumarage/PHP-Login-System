<?php 

	//If there is no constant called __CONFIG__, do not load this file
	if(!defined('__CONFIG__')){
		exit('You do not have a config file');
	}

	//DB config is below
	//Include the DB.php file
	include_once "classes/DB.php";

	$con = DB::getConnection();
?>