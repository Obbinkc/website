<?php
require '/core/database/connect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Deletes the course from database
mysql_query("DELETE FROM `courses` WHERE `course_id` = '".$_GET['id']."'");

header('Location: courses.php');
?>