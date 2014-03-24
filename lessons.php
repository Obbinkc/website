<?php
require ('includes/header.php');
?>

<div class="table-responsive">
    <table class=" table table-bordered table-hover"> 
        <tr>   <td><b>Course</b></td>
            <td><b>Lesson id</b></td>
            <td><b>Teacher</b></td>
            <td><b>Lesson start</b></td>
            <td><b>Lesson dismissed</b></td>
        </tr>

        <?php
        require ('core/init.php');
        require ('core/functions/lessonFunctions.php');


        $q = intval($_GET['id']);

  echo 'qq' . $q;
        $lessons = new lessonFunctions();

        //Calling the getCourses() method to retrieve the executed query
        $result = $lessons->getLessons($q);


        while ($row = $result->fetch_assoc()) {
            extract($row);
            echo "<tr>";
            echo "<td>" . $row['co.name'] . "</td>";
            echo "<td>" . $row['le.lessonId'] . "</td>";
            echo "<td>" . $row['us.first_name'] . "</td>";
            echo "<td>" . $row['le.startTime'] . "</td>";
            echo "<td>" . $row['le.endTime'] . "</td>";
            $lessonId = $row['course_id'];
            if ($user_data['type'] == 1) {
                echo '<td><a onclick="return confirm(\'Delete course? \')" href="deleteCourse.php?id=' . $lessonId . '">delete</td>';
                echo '<td><a href="updateCourse.php?id=' . $lessonId . '">update</td>';
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>

<?php
require ('includes/footer.php');
?>

