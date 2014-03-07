<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class courseFunctions {

//This method gets all the courses that equals to a specific catergoryId and return it
    function getCourses($q) {

        $query = "SELECT `course_id`,`name` FROM `courses` WHERE `categoryId` = '" . $q . "'";
        $result=mysql_query($query);
        
        return $result;
    }

}

?>
