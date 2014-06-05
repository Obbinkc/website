<?php
require ('./core/database/connect.php');
require ('includes/header.php');
require ('core/functions/courseFunctions.php');

//Checks if name, categoryId and courseTypes are set.
if (isset($_POST['name']) && isset($_POST['categoryId']) && isset($_POST['coursetypes'])) {
    $courseName = $_POST['name'];
    $courseyear = $_POST['categoryId'];
    $courseType = $_POST['coursetypes'];
    //Checks if courseName, courseYear and courseType are filled in
    if (!empty($courseName) && !empty($courseyear) && !empty($courseType)) {
        while ($courseyear > 4 || $courseyear < 1) {
            echo 'Kies voor courseyear een getal van 1 t/m 4.';
            if ($courseyear <= 4 || $courseyear >= 1) {
                break;
            }
        }
        $courses = new courseFunctions();
        $rows = $courses->checkCourseExist($courseName, $courseyear, $courseType);
        // echo 'rows ' . $rows;
        if ($rows > 0) {
            echo 'De course ' . $courseName . ' bestaat voor dat jaar al.';
        } else {
            // Updates the course data in mysql database 
            $sql = "UPDATE `courses` SET categoryId='" . $_POST['categoryId'] . "', name='" . $_POST['name'] . "', courseType='" . $_POST['coursetypes'] .
                    "' WHERE course_id='" . $_POST['course_id'] . "'";
            $result = mysqli_query(Database::getDatabaseConnection(), $sql) or
                    die("this failed");
            echo 'De wijzigingen zijn succesvol aangepast';
        }
    } else {
        if (empty($courseName)) {
            echo 'Voer een course name in';
        } elseif (empty($courseyear)) {
            echo 'Kies een vakjaar';
        } else {
            if (empty($courseType))
                echo 'Kies een vaktype';
        }
    }
}


?>
