<?php

//set connection variables

class Database {

    private $connection;
    private $host = "145.92.203.240";
    private $username = "huraibz001";  
    private $password = "welkommij3!";
    private $db_name = "zhuraibz001"; 

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
   public function connectToLDAP($user_name, $password, $access){
       $filter = "objectClass=*";
       $dn=  "uid=".$user_name.",ou=".$access.",dc=hva,dc=nl";
       //echo($user_name.$password);
       $port = 389;
       $ldap_con = ldap_connect("ldap.hva.nl", $port) or die("Could not connect to server. Error is ".ldap_error($ldap_con));
       if ($ldap_con) { 
            $ldapbind = ldap_bind($ldap_con, $dn, $password);
       }
       else{
          echo("can't connect to hva server"); 
       }
       if (!$ldapbind) {
           ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				username/password combination is incorrect
			</div> <?php
       }
        else{$search = ldap_search($ldap_con, $dn, $filter);
            $array = ldap_get_entries($ldap_con, $search);
            echo($array[0]["mail"][0]);
        }
       }
        
}

//connect with the database
/* mysql_cmysql_select_dbonnect('145.92.203.240', 'huraibz001', 'welkommij3!');
  ('zhuraibz001'); */
?>