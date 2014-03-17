<?php
//always start a session on web page, so you can track user behaviour
session_start ();
//error_reporting(0);

//includes functions to be used on every page you want
require ('core/database/connect.php');
require ('core/functions/general.php');
require ('core/functions/users.php');

//calls the functions to extract all the information from a specific user from the database
//$user=new UserFunctions();
if (/*$user->*/logged_in() == true) {
	$session_user_id = $_SESSION['user_id'];
        
	$user_data = /*$user->*/user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email', 'type');
}

?>