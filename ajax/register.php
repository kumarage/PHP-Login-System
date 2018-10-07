 <?php

	//Allow the config
	define('__CONFIG__',true);

	//Require the config 
	require_once "../inc/config.php";


	if($_SERVER['REQUEST_METHOD'] == 'POST' ){
		//Always return json format
		//header('Content-Type: application/json');
		//redirect to ggole
		//header("Location: https://google.com/");
		$return = [];

		$email = Filter::String($_POST['email']);

		//make sure the user doesn't exist
		$findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email',$email, PDO::PARAM_STR);
		$findUser->execute();

		if($findUser->rowCount()==1){
			//user exist
			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else {
			//user doesn't exist add them

			//create password through hash
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
			$addUser->bindParam(':email',$email, PDO::PARAM_STR);
			$addUser->bindParam(':password',$password, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			$_SESSION['user_id'] = (int)$user_id;

			$return['redirect'] = '/php_login_course/dashboard.php?message=welcome';

			$return['is_logged_in'] = true;
		}

		//make sure the user can be added and is added

		//Return proper information back to javascript to redirect us

		//$return['redirect'] = '/php_login_course/index.php?this-was-a-redirect';
		//$return['redirect'] = '/php_login_course/dashboard.php';
		//$return['name'] = 'Pubudu Kumarage';
		//JSON_PRETTY_PRINT makes the array looks nice for us
		echo json_encode($return, JSON_PRETTY_PRINT); 
		exit;
	} else {
		//kill the scripts
	  exit('Invalid URL');
	}
	
?>


