<?php
require '/core/database/connect.php';
require ('includes/header.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo 'cate ID '. $_POST['course_id'];
// update data in mysql database 
$sql="UPDATE `courses` SET 'categoryId'='".$_POST['categoryId']."', 'name'='".$_POST['name']."WHERE `course_id` = '" . $_POST['course_id'] . "'";

$result=mysql_query($sql)or 
die ("this failed");


// if successfully updated. 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='list_records.php'>View result</a>";
}

else {
echo "ERROR";
}
?>
