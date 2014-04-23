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
			$register_data = array(
			'first_name'	=> $user_data['first_name'],
			'last_name'		=> $user_data['last_name'],
			'lescode'		=> $lesson['lescode']
			);
			
			regUserLesson($register_data);
		}		
	}
	
include ('includes/footer.php');
?>