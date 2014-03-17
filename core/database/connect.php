<?php

//set connection variables

class Database {

    private $connection;
    private $host = "145.92.203.240";
    private $username = "huraibz001";
    private $password = "welkommij3!";
    private $db_name = "zhuraibz001"; //database name

//connect to mysql server

    public static function getDatabaseConnection() {
        global $host;
        global $username;
        global $password;
        global $db_name;

        //$connection = new mysqli($host, $username, $password, $db_name);
        $connection = new mysqli("145.92.203.240", "huraibz001", "welkommij3!", "zhuraibz001");
        return $connection;
    }
}

//connect with the database
/* mysql_connect('145.92.203.240', 'huraibz001', 'welkommij3!');
  mysql_select_db('zhuraibz001'); */
?>