<?php
//handles the logout request
session_start();
session_destroy();
header ('location: index.php');
?>