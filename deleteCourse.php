<?php
require ('./core/database/connect.php');

//Deletes the course from the database
mysqli_query(Database::getDatabaseConnection(),"DELETE FROM `courses` WHERE `course_id` = '".$_GET['id']."'");

header('Location: courses.php');
?>
