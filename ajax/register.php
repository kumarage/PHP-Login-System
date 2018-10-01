 <?php

	//Allow the config
	define('__CONFIG__',true);

	//Require the config 
	require_once "../inc/config.php";


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Always return json format
		header('Content-Type: application/json');
		//redirect to ggole
		//header("Location: https://google.com/");
		$return = [];

		//make sure the user doesn't exist

		//make sure the user can be added and is added

		//Return proper information back to javascript to redirect us

		//$return['redirect'] = '/php_login_course/index.php?this-was-a-redirect';
		$return['redirect'] = '/php_login_course/dashboard.php';
		$return['name'] = 'Pubudu Kumarage';
		//JSON_PRETTY_PRINT makes the array looks nice for us
		echo json_encode($return, JSON_PRETTY_PRINT); 
		exit;
	} else {
		//kill the scripts
	  exit('test');
	}
	
?>


