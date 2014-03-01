<?php
//this file contains all function related to users
//function that can be called to get the user data from the database
function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		
		$fields = '`' . implode ('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}
}

//function that can be called to check the user id of the surrent logged in user
function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

//function that is called to check if the filled in username exists in the database
function user_exists($username) {
	$username = sanitize ($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'"); 
	return (mysql_result ($query, 0) == 1) ? true : false;
}

//function that is called to check if the filled in username is activated
function user_active($username){
    $username = sanitize($username);
    $query =  mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result ($query, 0) == 1) ? true : false;
}

//function that is called to select the correct user id for the logged in username
function user_id_from_username($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");
	return mysql_result ($query, 0, 'user_id');
}

//functions that is called to process a login request
function login($username, $password) {
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = md5 ($password);
	
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
	return (mysql_result($query, 0) == 1) ? $user_id : false;
}
?>