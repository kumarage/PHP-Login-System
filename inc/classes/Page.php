<?php

if(!defined('__CONFIG__')){
	exit('You do not have a config file');
}

class Page {
	static function ForceLogIn(){
	//force user to log in or redirect
		if(isset($_SESSION['user_id'])){
			//the user is allowed here
			echo "you logged in";
		}else{
			//user is not allowed
			header("Location:/php_login_course/login.php");
			exit;
		}
	}

	static function ForceDashboard(){
		//force user to log in or redirect
			if(isset($_SESSION['user_id'])){
				//the user is allowed here
				header("Location:/php_login_course/dashboard.php");
				exit('function exit');
			}else{
				//user is not allowed
			}
	}

}

?>