<?php
require ('core/init.php');
require ('core/functions/lessonFunctions.php');
include ('includes/header.php');
	
if (isset($_POST)){
	$reglesson = $_POST['lessonnumber'];
	$result = /*$user->*/reglesson($reglesson);
	$lesson = $result->fetch_assoc();
	if (empty($lesson['lescode'])){ 
			echo 'crap';
		} else {
			echo 'nice';
		}		
	}
	
include ('includes/footer.php');
?>