<?php
//This page handles the request of a student to register to a specific lesson.
require ('core/init.php');
require ('core/functions/lessonFunctions.php');
include ('includes/header.php');

date_default_timezone_set('Europe/Berlin'); 
$currentDateTime = date("Y-m-d H:i:s");
if (isset($_POST)) {
    $reglesson = $_POST['lessonnumber'];
    $result = reglesson($reglesson);

    $ResultDateTimeLesson = getDateTimesOfLesson($reglesson);
    // fetch associative array 
    $DateTimeLesson = $ResultDateTimeLesson->fetch_assoc();
    $lesson = $result->fetch_assoc();
    if (empty($lesson['lescode'])) {
         echo 'Error: lessoncode incorrect';
    } else {
         $rows = checkStudentOnList($user_data['user_id']);
        if ($currentDateTime < $DateTimeLesson['startTime']) {
            echo 'You are to early to be present';
        } //Door else if te gebruiken, mag hij maar door één van die if's gaan.
        else if ($currentDateTime > $DateTimeLesson['endTime']) {
            echo 'Unfortunately you are too late';
        }
        else if($rows>0){
            echo'You already have registered for this lesson';
            
        }
        else {
            $register_data = array(
                'first_name' => $user_data['first_name'],
                'last_name' => $user_data['last_name'],
                'lescode' => $lesson['lescode'],
                'user_id'=>$user_data['user_id']
            );

            regUserLesson($register_data);
        }
    }
}

include ('includes/footer.php');
?>