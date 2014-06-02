<?php
//This page handles the login request.
require ('core/init.php');
include ('includes/header.php');
	
if (isset($_POST)){
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$user=new UserFunctions();
	if (empty($username) || empty($password)) { 
		$errors[] = 'Learn to type dude';
	} else if (/*$user->*/user_exists($username) == false) { ?>
		<div class="alert alert-danger">
			<strong>Error!</strong>
			User does not exist
		</div> <?php
	} else if (/*$user->*/user_active($username) == false) { ?>
		<div class="alert alert-danger">
			<strong>Error!</strong>
			Account not activated
		</div> <?php
	} else {
		$login = /*$user->*/login($username, $password);
		if ($login == false) { ?>
			<div class="alert alert-danger">
				<strong>Error!</strong>
				That username/password combination is incorrect
			</div> <?php
		} else {
			//set the user session
			$_SESSION['user_id'] = $login;
			//redirect user to home
			header('location: index.php');
			exit();
		}
	}
	
}
include ('includes/footer.php');
?>