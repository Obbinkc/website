<?php

//set connection variables
/*
$host = "145.92.203.240";

$username = "huraibz001";

$password = "welkommij3";

$db_name = "zhuraibz001"; //database name

//connect to mysql server

$mysqli = new mysqli($host, $username, $password, $db_name);

//check if any connection error was encountered

if(mysqli_connect_errno()) {

echo "Error: Could not connect to database.";

exit;

}
*/
//$mysqli=new mysqli($host, $user, $password, $database, $port, $socket);

//connect with the database
mysql_connect('145.92.203.240', 'huraibz001', 'welkommij3!');
mysql_select_db('zhuraibz001');
?>