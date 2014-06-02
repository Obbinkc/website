<?php

class courseFunctions {

//This method gets all the courses that equals to a specific catergoryId and return it
    function getFulltimeCoursesByCategoryId($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT `course_id`,`name`, `courseType` FROM `courses` WHERE `categoryId` = '" . $q . "'
            AND `courseType` = 'fulltime'";
        $result = $mysqli->query($query);
        //if (mysql_num_rows($result)==0) { echo'ja hij returned niks';}
        
        return $result;
    }
     function getParttimeCoursesByCategoryId($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT `course_id`,`name`, `courseType` FROM `courses` WHERE `categoryId` = '" . $q . "'
            AND `courseType` = 'parttime'";
        $result = $mysqli->query($query);
        //if (mysql_num_rows($result)==0) { echo'ja hij returned niks';}
        
        return $result;
    }
     function getDualtimeCoursesByCategoryId($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT `course_id`,`name`, `courseType` FROM `courses` WHERE `categoryId` = '" . $q . "'
            AND `courseType` = 'dualtime'";
        $result = $mysqli->query($query);
        //if (mysql_num_rows($result)==0) { echo'ja hij returned niks';}
        
        return $result;
    }
    
    
    
       function getCoursesByCategoryId($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT `course_id`,`name` FROM `courses` WHERE `categoryId` = '" . $q . "'";
        $result = $mysqli->query($query);
  
        return $result;
    }
    
    function getCourses() {
    $mysqli = Database::getDatabaseConnection();
    $query = "SELECT course_id, name FROM `courses` ";
    $result = $mysqli->query($query);
    return $result;
}
  function getCourseTypes() {
    $mysqli = Database::getDatabaseConnection();
    $query = "SELECT courseType FROM `courses`";
    $result = $mysqli->query($query);
    return $result;
}
      function getCourseById($q) {
          
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT course_id, categoryId, name FROM courses WHERE course_id = '" . $q . "'";
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();

        return $row;
    }

    function getCoursesByName($name, $year, $courseType) {

        $query = "SELECT name, categoryId FROM courses WHERE name = '" . $name . "'" .
                "AND categoryId ='" . $year . "'".
                 "AND courseType ='" . $courseType . "'";
        
        $result = mysqli_query(Database::getDatabaseConnection(), $query);
        return $result;
    }
    
    function getCourseId($name){
        $id = "";
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT course_id FROM courses WHERE name = '" . $name . "'";
        $result = $mysqli->query($query);
       
        while ($row = $result->fetch_assoc()) {
            $id = $row['course_id'];
        }
        
        return $id; 
    }
    
    function checkCourseExist($name, $year, $courseType) {
        $result = $this->getCoursesByName($name, $year, $courseType);
        return mysqli_num_rows($result);
    }
    
     public function addCourse($course) {

        $query = "INSERT INTO `courses` VALUES (NULL,'" . mysqli_real_escape_string(Database::getDatabaseConnection(),$course->getCategoryId()) .
                 "','" . mysqli_real_escape_string(Database::getDatabaseConnection(),$course->getCoursename()). 
                "','" .mysqli_real_escape_string(Database::getDatabaseConnection(),$course->getCoursetype())."')";
        
        if (mysqli_query(Database::getDatabaseConnection(),$query)) {
           echo 'De course is succesvol is aangemaakt';
        } else {
            echo 'Sorry het aanmaken van een course is niet gelukt. Probeer het later nog eens: ' . mysqli_error();
        }
    }

}

?>
