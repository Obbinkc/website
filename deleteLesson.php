<?php
require '/core/database/connect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Deletes the course from database
mysqli_query(Database::getDatabaseConnection(),"DELETE FROM `lessons` WHERE `lessonId` = '".$_GET['id']."'");

header('Location: lessons.php');
?>
