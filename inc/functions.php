<?php	

function ForceLogIn(){
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

function ForceDashboard(){
	//force user to log in or redirect
		if(isset($_SESSION['user_id'])){
			//the user is allowed here
			header("Location:/php_login_course/dashboard.php");
		}else{
			//user is not allowed
			exit;
		}
}
?>