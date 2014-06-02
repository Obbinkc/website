<?php
require ('core/init.php');
//require ('includes/header.php');
require ('core/functions/courseFunctions.php');
?>

<!--
Code voor het zoeken van een course
-->
<!DOCTYPE html>
<!--
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<h2>Search Results</h2>-->

<?php


/*if (isset($_POST['search'])) {
    //header("Location:courses.php");
    $search = $_POST['search'];*/

    /* @var $POST type */
    //SELECT *
   /* $search_sql = "SELECT * FROM courses WHERE name OR year = '" . $search . "'";
    $search_query = mysqli_query(Database::getDatabaseConnection(),$search_sql);
    
    //echo 'search_sql '. $search_sql;
    echo 'search_query '. $search_query;   */
    //$courses = new courseFunctions(); 
    //$result = $courses->getCoursesByName($name, $year);
  //  echo 'result '.$result;
    
    
    /* 
    if (mysqli_num_rows($search_query) > 0) {
        $search_rs = mysqli_fetch_assoc($search_query);
         
        do {
            while ($row = $search_rs->fetch_assoc()) {
            extract($row);
            echo "<tr>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            $courseId = $row['course_id'];
            
            if ($user_data['type'] == 1) {
                echo '<td><a onclick="return confirm(\'Delete course? \')" href="deleteCourse.php?id=' . $courseId . '">delete</td>';
                echo '<td><a href="updateCourse.php?id=' . $courseId . '">update</td>';
                echo '<td><a href="lessons.php?id=' . $courseId . '">lessons</td>';
                echo "</tr>";
                
                }else if ($user_data['type'] == 0) {
                            echo '<td><a href="lessons.php?id=' . $courseId . '">lessons</td>';
                            echo "</tr>";
                }
        }
            //echo $search_rs['name'] . "<br>";
            
            }while ($search_rs = mysqli_fetch_assoc($search_query));
         
    
        }else {
            echo "<h3>No Results</h3>";
        }
}*/

?>
       

<?php 
/*if (mysqli_num_rows($search_query) > 0) {
    do {
        ?>
                <P><?php echo $search_rs['name'] . "<br>" ; ?></p>   

            <?php
            } while ($search_rs = mysqli_fetch_assoc($search_query));
        } else {
            //echo "LOL No results found";
        }*/
        ?>
    </body>

</html>
