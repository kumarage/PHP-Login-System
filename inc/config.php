<?php 

	//If there is no constant called __CONFIG__, do not load this file
	if(!defined('__CONFIG__')){
		exit('You do not have a config file');
	}
	
	//sessions are always on
	if(!isset($_SESSION)) {
		session_start();
	}
	//Allow errors
	error_reporting(-1);
	ini_set('display_errors','On');

	//DB config is below
	//Include the DB.php file
	include_once "classes/DB.php";
	include_once "classes/User.php";
	include_once "classes/Filter.php";
	include_once "classes/Page.php";
	include_once "functions.php";

	$con = DB::getConnection();
?>