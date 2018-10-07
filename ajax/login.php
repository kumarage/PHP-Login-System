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

		$email = Filter::String( $_POST['email'] );
		$password = $_POST['password'];

		//make sure the user doesn't exist
		$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email',$email, PDO::PARAM_STR);
		$findUser->execute();

		if($findUser->rowCount() == 1){
			//user existtry and sign them in
			$User = $findUser->fetch(PDO::FETCH_ASSOC);
			$user_id = (int) $User['user_id'];
			$hash = (string) $User['password'];
			
			if(password_verify($password, $hash)){
				//user is logged in
				$return['redirect'] = '/php_login_course/dashboard.php';
				$_SESSION['user_id'] = $user_id;

			}else {
				//invalid user
				$return['error'] = "Invalid User Email or Password";
				
			}


		} else {
			//user doesn't exist add them

			//create password through hash
			$return['error'] = "No account, <a href='/register.php'>Create One?</a>";
		}

		//make sure the user can be added and is added

		//Return proper information back to javascript to redirect us

		//$return['redirect'] = '/php_login_course/index.php?this-was-a-redirect';
		//$return['redirect'] = '/php_login_course/dashboard.php';
		//JSON_PRETTY_PRINT makes the array looks nice for us
		echo json_encode($return, JSON_PRETTY_PRINT); 
		exit;
	} else {
		//kill the scripts
	  exit('Invalid URL');
	}
	
?>


