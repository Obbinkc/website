<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class courseFunctions {

//This method gets all the courses that equals to a specific catergoryId and return it
    function getCourses($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT `course_id`,`name` FROM `courses` WHERE `categoryId` = '" . $q . "'";
        //$result = mysql_query($query);
        $result = $mysqli->query($query);
        //$num_results = mysqli_num_rows($result);
      //  $row = $result->num_rows();
          // $num_results = mysqli_num_rows($result);
        
        return $result;
    }
    
      function getCourseById($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT 'course_id',`categoryId`,`name` FROM `courses` WHERE `course_id` = '" . $q . "'";
//        $result = mysql_query($query);
        $result = $mysqli->query($query);
        return $result;
    }
    
    

    function getCoursesByName($name, $year) {

        $query = "SELECT name, categoryId FROM `courses` WHERE name = '" . $name . "'" .
                "AND categoryId ='" . $year . "'";
        $result = mysqli_query(Database::getDatabaseConnection(), $query);
        return $result;
       /* if (mysql_num_rows($result) === 1) {
            echo 'De course ' . $name . ' bestaat voor dat jaar al.';
        }*/
       /*  else{
            $course = new Course;
            $course->setCoursename($name);
            $course->setCategoryId($year);
           $add->addCourse($course);
            
         }*/    
    }
    
    function checkCourseExist($name, $year) {
        $result = $this->getCoursesByName($name, $year);
        return mysqli_num_rows($result);
    }
    
     public function addCourse($course) {

        $query = "INSERT INTO `courses` VALUES (NULL,'" . mysqli_real_escape_string(Database::getDatabaseConnection(),$course->getCategoryId()) .
                 "','" . mysqli_real_escape_string(Database::getDatabaseConnection(),$course->getCoursename())."')";
        
        if (mysqli_query(Database::getDatabaseConnection(),$query)) {
           echo 'De course is succesvol is aangemaakt';
        } else {
            echo 'Sorry het aanmaken van een course is niet gelukt. Probeer het later nog eens: ' . mysql_error();
        }
    }

}

?>
