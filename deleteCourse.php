<?php
require '/core/database/connect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
mysql_query("DELETE FROM `courses` WHERE `course_id` = '".$_GET['id']."'");

header('Location: courses.php');
?>
