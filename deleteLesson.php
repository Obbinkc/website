<?php
require '/core/database/connect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Deletes the course from database
$lessonId = $_GET['id'];
//echo 'qq' . $lessonId;

mysqli_query(Database::getDatabaseConnection(),"DELETE FROM lessons WHERE lessonId = '".$lessonId."'");

header('Location: lessons.php');
?>
