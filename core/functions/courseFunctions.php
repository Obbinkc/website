<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class courseFunctions {

//This method gets all the courses that equals to a specific catergoryId and return it
    function getCourses($q) {

        $query = "SELECT `course_id`,`name` FROM `courses` WHERE `categoryId` = '" . $q . "'";
        $result = mysql_query($query);

        return $result;
    }
    
      function getCourseById($q) {

        $query = "SELECT 'course_id',`categoryId`,`name` FROM `courses` WHERE `course_id` = '" . $q . "'";
        $result = mysql_query($query);

        return $result;
    }

    function getCoursesByName($name, $year) {

        $query = "SELECT `name` FROM `courses` WHERE `name` = '" . mysql_real_escape_string($name) . "'" .
                "AND 'categoryId' ='" . $year . "'";
        $result = mysql_query($query);
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
    
     public function addCourse($course) {

        $query = "INSERT INTO `courses` VALUES (NULL,'" . mysql_real_escape_string($course->getCategoryId()) .
                 "','" . mysql_real_escape_string($course->getCoursename())."')";
        
        if (mysql_query($query)) {
           echo 'De course is succesvol is aangemaakt';
        } else {
            echo 'Sorry het aanmaken van een course is niet gelukt. Probeer het later nog eens: ' . mysql_error();
        }
    }

}

?>
