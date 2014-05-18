<?php

require ('core/init.php');
require ('core/functions/lessonFunctions.php');
include ('includes/header.php');
$currentDateTime = date("Y-m-d H:i:s");
//echo "current time" . $currentDateTime;
if (isset($_POST)) {
    $reglesson = $_POST['lessonnumber'];
    $result = /* $user-> */reglesson($reglesson);

    $ResultDateTimeLesson = getDateTimesOfLesson($reglesson);
    $DateTimeLesson = $ResultDateTimeLesson->fetch_assoc();
    //   echo "lol ".  $DateTimeLesson;
   // echo "starttijd " . $DateTimeLesson['startTime'];
    $lesson = $result->fetch_assoc();
    if (empty($lesson['lescode'])) {
        echo 'crap';
    } else {
        
        if ($currentDateTime < $DateTimeLesson['startTime']) {
            echo 'You are to early to be present';
        } //Door else if te gebruiken, mag hij maar door één van die if's gaan.
        else if ($currentDateTime > $DateTimeLesson['endTime']) {
            echo 'Unfortunately you are too late';
        } 
        else {
            $register_data = array(
                'first_name' => $user_data['first_name'],
                'last_name' => $user_data['last_name'],
                'lescode' => $lesson['lescode']
            );

            regUserLesson($register_data);
        }
    }
}

include ('includes/footer.php');
?>