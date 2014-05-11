<?php
require ('core/init.php');
include ('includes/header.php');
	
if (isset($_POST)){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_again = $_POST['password_again'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];

	//$user=new UserFunctions();
    if (user_exists($username) == true) { 
		echo 'The user \'' . $username . '\' already exists <br>';
	}
	else if (email_exists($email) == true) { 
		echo 'The email \'' . $email . '\' already exists <br>';
	}
	else if (strlen($password) < 6){
		echo 'Your password must be at least 6 characters <br>';
	}
	else if ($password !== $password_again){
		echo 'Your passwords do not match <br>';
	}
	else {	
		register_user($username, $password, $first_name, $last_name, $email);
	}
	
}
include ('includes/footer.php');
?>