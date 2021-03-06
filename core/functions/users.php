<?php

//class UserFunctions extends mysqli {
//this file contains all function related to users
//function that can be called to get the user data from the database
function user_data($user_id) {
    $mysqli = Database::getDatabaseConnection();
    $query = "SELECT user_id, username, password, first_name, last_name, email, type FROM `users` WHERE user_id ='" . $user_id . "'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    return $row;
}

//function that can be called to check the user id of the surrent logged in user
function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}

//function that is called to check if the filled in username exists in the database
function user_exists($username) {
    $mysqli = Database::getDatabaseConnection();
    $username = sanitize($username);
    //query all records from the database
    $query = "SELECT `user_id` FROM `users` WHERE `username` = '$username'";
	//execute the query
    $result = $mysqli->query($query);

	//get number of rows returned
	$num_results = mysqli_num_rows($result);
    
    if ($num_results > 0) {
        return true;
    } else {
    return false;
	}
}

//check if email already exists
function email_exists($email) {
    $mysqli = Database::getDatabaseConnection();
    $email = sanitize($email);
	//query all records from the database
	$query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
	//execute the query
	$result = $mysqli->query($query);
	//get number of rows returned
	$num_results = mysqli_num_rows($result);
	 
	if ($num_results > 0) {
        return true;
    } else {
    return false;
	}
}
	
//function that is called to check if the filled in username is activated
function user_active($username) {
    $mysqli = Database::getDatabaseConnection();
    $username = sanitize($username);
	//query all records from the database
    $query = "SELECT `user_id` FROM `users` WHERE `username` = '$username' AND `active` = 1";
    //execute the query
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
	
    return ($stmt->fetch() == 1) ? true : false;
}

function getTeachers() {
    $mysqli = Database::getDatabaseConnection();
	//query all records from the database
    $query = "SELECT user_id, username FROM `users` WHERE type = 1";
    //execute the query
    $result = $mysqli->query($query);
    
    return $result;
}

//function that is called to select the correct user id for the logged in username
function user_id_from_username($username) {
    $mysqli = Database::getDatabaseConnection();
    $username = sanitize($username);
	//query all records from the database
    $query = "SELECT `user_id` FROM `users` WHERE `username` = '$username'";
	//execute the query
    $result = $mysqli->query($query);

    return $result->fetch_row();
}

//functions that is called to process a login request
function login($username, $password) {
    $mysqli = Database::getDatabaseConnection();

    $user_id = user_id_from_username($username);

    $username = sanitize($username);
    $password = md5($password);
	//query all records from the database
    $query = "SELECT (`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    //execute the query
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    return ($stmt->fetch() == 1) ? $user_id : false;
}

//function to register a user
function register_user($username, $password, $first_name, $last_name, $email){
	$username = sanitize($username);
   	$password = md5($password);
	$first_name = sanitize($first_name);
	$last_name = sanitize($last_name);
	$email = sanitize($email);
	$active = 1;
	//query all records from the database
	$query = "INSERT INTO users(username, password, first_name, last_name, email, active) 
	VALUES ('".$username."','".$password."','".$first_name."','".$last_name."','".$email."','".$active."')";
	//execute the query	
	if (mysqli_query(Database::getDatabaseConnection(),$query)) {
           echo 'U bent succesvol geregistreerd!';
        } else {
            echo 'Sorry het is niet gelukt om je te registreren ' . mysqli_error(Database::getDatabaseConnection());
        }	
}


//}
?>