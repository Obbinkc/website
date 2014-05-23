<?php
require ('/core/database/connect.php');
require ('includes/header.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo 'course ID '. $_POST['course_id'];
echo 'course cat ID '. $_POST['categoryId'];
echo 'course name '. $_POST['name'];

// Updates the course data in mysql database 
$sql="UPDATE `courses` SET categoryId='" . $_POST['categoryId'] . "', name='" . $_POST['name'] . "' WHERE course_id='" . $_POST['course_id'] . "'";

$result=mysqli_query(Database::getDatabaseConnection(),$sql)or 
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
