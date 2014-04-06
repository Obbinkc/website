<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class lessonFunctions {

    function getLessons($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT co.name,le.lessonId, us.first_name, le.startTime, le.endTime, le.course_id
            FROM lessons le inner join courses co on le.course_id = co.course_id
            inner join users us
            on le.user_id = us.user_id
            WHERE le.course_id = '" . $q . "'";

       
        //$result = mysql_query($query);
        $result = $mysqli->query($query);
        //$num_results = mysqli_num_rows($result);
        //  $row = $result->num_rows();
        // $num_results = mysqli_num_rows($result);

        return $result;
    }
    
      public function addLesson($lesson) {

        $query = "INSERT INTO `lessons` VALUES (NULL,'" . mysqli_real_escape_string(Database::getDatabaseConnection(),$lesson->getLessonId()) .
                 "','" . mysqli_real_escape_string(Database::getDatabaseConnection(),$lesson->getCourse_id())."','". 
                mysqli_real_escape_string(Database::getDatabaseConnection(),$lesson->getStartTime())."','".
                mysqli_real_escape_string(Database::getDatabaseConnection(),$lesson->getEndTime()).
                "')";
        
        if (mysqli_query(Database::getDatabaseConnection(),$query)) {
           echo 'De les is succesvol is aangemaakt';
        } else {
            echo 'Sorry het aanmaken van een course is niet gelukt. Probeer het later nog eens: ' . mysql_error();
        }
    }

}

      function reglesson($reglesson) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT `lescode` FROM `lessons` WHERE `lescode` = '" . $reglesson . "'";
        $result = $mysqli->query($query);
        return $result;
    }

?>
