<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class lessonFunctions {

    function getLessons($q) {
        $mysqli = Database::getDatabaseConnection();
        $query = "SELECT co.name,le.lessonId, us.first_name, le.startTime, le.endTime 
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

}

?>
