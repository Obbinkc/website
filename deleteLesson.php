<?php
require ('./core/database/connect.php');
//Deletes the course from database
$lessonId = $_GET['id'];
$courseId=$_GET['courseId'];
mysqli_query(Database::getDatabaseConnection(),"DELETE FROM lessons WHERE lessonId = '".$lessonId."'");

header('Location: lessons.php?id='.$courseId);
?>