<?php

class lessonFunctions {

    function updateLesson($lesson) {
      /*  echo "<br>Lesson USER ID: " . $lesson->getUserId();
        echo "<br>Lesson course ID: " . $lesson->getCourse_id();
        echo "<br>Lesson starttime: " . $lesson->getStartTime();
        echo "<br>Lesson endtime: " . $lesson->getEndTime();
        echo "<br>Lesson lescode: " . $lesson->getLesCode();
        echo "<br>Lesson lessonId: " . $lesson->getLessonId();*/


        // Updates the course data in mysql database
        $sql = "UPDATE `lessons` SET  user_id='" . $lesson->getUserId() . "', course_id='" . $lesson->getCourse_id() .
                "', startTime='" . $lesson->getStartTime() . "', endTime='" . $lesson->getEndTime() .
                "', lescode='" . $lesson->getLesCode() .
                "' WHERE lessonId='" . $lesson->getLessonId() . "'";

        $result = mysqli_query(Database::getDatabaseConnection(), $sql) or
                die("this failed");


        // if successfully updated.
        if ($result) {
            echo "Successful";
            echo "<BR>";
            echo "<a href='list_records.php'>View result</a>";
        } else {
            echo "ERROR";
        }
    }

    function getLessonById($q) {

        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT  startTime, endTime, lescode FROM lessons "
                . " WHERE lessonId = '" . $q . "'";
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();

        return $row;
    }

    function getLessons($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT co.name,le.lessonId, us.first_name, le.startTime, le.endTime, le.course_id, le.lescode
            FROM lessons le inner join courses co on le.course_id = co.course_id
            inner join users us
            on le.user_id = us.user_id
            WHERE le.course_id = '" . $q . "'";

        $result = $mysqli->query($query);

        return $result;
    }
   function getTimesOfTeacher($teacherId) {
        $mysqli = Database::getDatabaseConnection();
         $query = $mysqli->query("SELECT user_id, startTime, endTime FROM lessons "
                . " WHERE user_id = '" . $teacherId . "'");
     //   $result = $mysqli->query($query);    
        return $query;
    }

    public function addLesson($lesson) {
        $query = "INSERT INTO lessons (lessonId, user_id, course_id, startTime, endTime, lescode) VALUES ('NULL','" . mysqli_real_escape_string(Database::getDatabaseConnection(), $lesson->getUserId()) .
                "','" . mysqli_real_escape_string(Database::getDatabaseConnection(), $lesson->getCourse_id()) . "','" .
                mysqli_real_escape_string(Database::getDatabaseConnection(), $lesson->getStartTime()) . "','" .
                mysqli_real_escape_string(Database::getDatabaseConnection(), $lesson->getEndTime()) .
                "','" . mysqli_real_escape_string(Database::getDatabaseConnection(), $lesson->getLesCode()) . "')";
       // var_dump($query);
        if (mysqli_query(Database::getDatabaseConnection(), $query)) {
            echo 'De les is succesvol is aangemaakt';
        } else {
            echo 'Sorry het aanmaken van een course is niet gelukt. Probeer het later nog eens: ' . mysqli_error(Database::getDatabaseConnection());
        }
    }

}

function reglesson($reglesson) {
    $mysqli = Database::getDatabaseConnection();
    $query = "SELECT `lescode` FROM `lessons` WHERE `lescode` = '" . $reglesson . "'";
    $result = $mysqli->query($query);
    return $result;
}

//Checks if the student already has registered for a lesson
 function checkStudentOnList($userId) {
        $query = "SELECT * FROM reglesson WHERE user_id = '" . $userId . "'";
        $result = mysqli_query(Database::getDatabaseConnection(), $query);
        return mysqli_num_rows($result);
    }

function getDateTimesOfLesson($reglesson) {
    $mysqli = Database::getDatabaseConnection();
    $query = "SELECT startTime, endTime FROM `lessons` WHERE `lescode` = '" . $reglesson . "'";
    $result = $mysqli->query($query);
    //var_dump($query);
    //var_dump($result);
    return $result;
}

function regUserLesson($register_data) {
    //echo "INSERT INTO `reglesson`(`first_name`, `last_name`, `lescode`) VALUES ('".$register_data['first_name']."','".$register_data['last_name']."','".$register_data['lescode']."')";
    $query = "INSERT INTO reglesson (first_name, last_name, lescode, user_id) VALUES ('"
            . mysqli_real_escape_string(Database::getDatabaseConnection(), $register_data['first_name']) . "','"
            . mysqli_real_escape_string(Database::getDatabaseConnection(), $register_data['last_name']) . "','"
            . mysqli_real_escape_string(Database::getDatabaseConnection(), $register_data['lescode']) . "','"
            . mysqli_real_escape_string(Database::getDatabaseConnection(), $register_data['user_id']) . "')";

    //var_dump($query);
    if (mysqli_query(Database::getDatabaseConnection(), $query)) {
        echo 'Gelukt!';
    } else {
        echo 'Sorry het is niet gelukt om je te registreren voor de les ' . mysqli_error(Database::getDatabaseConnection());
    }
}

function students($students) {
    $mysqli = Database::getDatabaseConnection();
    $query = "SELECT first_name, last_name FROM `reglesson` WHERE lescode ='" . $students . "'";
    $result = $mysqli->query($query);
    return $result;
}

?>
