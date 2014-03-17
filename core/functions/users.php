<?php

//require ('core/database/connect.php');
//class UserFunctions extends mysqli {
//this file contains all function related to users
//function that can be called to get the user data from the database
function user_data($user_id) {
    $mysqli = Database::getDatabaseConnection();
    $data = array();
    $user_id = (int) $user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1) {
        unset($func_get_args[0]);

        $fields = '`' . implode('`, `', $func_get_args) . '`';

        $query = "SELECT $fields FROM `users` WHERE `user_id` = $user_id";

        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        return $stmt->fetch();

        // $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
    }
}

//function that can be called to check the user id of the surrent logged in user
function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}

//function that is called to check if the filled in username exists in the database
function user_exists($username) {
    $mysqli = Database::getDatabaseConnection();
    $username = sanitize($username);
    //$query = mysqli_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
    //query all records from the database

    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'";
//execute the query
    $result = $mysqli->query($query);

//get number of rows returned

    $num_results = mysqli_num_rows($result);
    //  return ($result->num_rows) ? true : false;
    //return (mysqli_fetch_row($num_results) == 1) ? true : false;
    if ($num_results > 1) {
        return false;
    }
    return true;
//return (mysql_result($num_results, 0) == 1) ? true : false;
    //return (mysql_result($query, 0) == 1) ? true : false;
}

//function that is called to check if the filled in username is activated
function user_active($username) {
    $mysqli = Database::getDatabaseConnection();
    $username = sanitize($username);
    // $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1";
    //execute the query
    //$result = $mysqli->query($query);
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    return ($stmt->fetch() == 1) ? true : false;

// return (mysql_result($query, 0) == 1) ? true : false;
}

//function that is called to select the correct user id for the logged in username
function user_id_from_username($username) {
    $mysqli = Database::getDatabaseConnection();

    $username = sanitize($username);
    $query = "SELECT `user_id` FROM `users` WHERE `username` = '$username'";
    //$query = mysqli_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");


    $result = $mysqli->query($query);

    return $result->fetch_row();
    //    return mysql_result($query, 0, 'user_id');
}

//functions that is called to process a login request
function login($username, $password) {
    $mysqli = Database::getDatabaseConnection();

    $user_id = user_id_from_username($username);

    $username = sanitize($username);
    $password = md5($password);

    $query = "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    //  $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    return ($stmt->fetch() == 1) ? $user_id : false;

    //  return (mysql_result($query, 0) == 1) ? $user_id : false;
}

//}
?>