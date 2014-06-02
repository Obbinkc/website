<div class="table-responsive">
    <table class=" table table-bordered table-hover"> 
        <tr>   <td><b>Course id</b></td>
            <td><b>Course naam</b></td>

        </tr>

        <?php
        require ('core/init.php');
        require ('core/functions/courseFunctions.php');

        //We get 'q' from the open() method in courses.php. We use GET because we have used GET in courses.php.
        $q = intval($_GET['q']);
        
        
        $courses = new courseFunctions();
      
        //Calling the getCourses() method to retrieve the executed query
        $result = $courses->getParttimeCoursesByCategoryId($q);

        
        while ($row = $result->fetch_assoc()) {
            extract($row);
            echo "<tr>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            $courseId = $row['course_id'];
            if ($user_data['type'] == 1) {
                echo '<td><a onclick="return confirm(\'Delete course? \')" href="deleteCourse.php?id=' . $courseId . '">delete</td>';
                echo '<td><a href="updateCourse.php?id=' . $courseId . '&courseName=' . $row['name'] .  '&courseType=' . $row['courseType']. '">update</td>';
                echo '<td><a href="lessons.php?id=' . $courseId . '">lessons</td>';
                echo "</tr>";
                 

            }
        }
        ?>
    </table>
</div>
<?php
require ('includes/footer.php');
?>