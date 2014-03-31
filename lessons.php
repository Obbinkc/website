<?php
require ('includes/header.php');
?>
<script>
    $(document).ready(function() {
        $('#addLesson p').click(function() {
            $('#lesson-form').slideToggle(300);
            $(this).toggleClass('close');
        });
    });
</script>
<div class="table-responsive">
    <table class=" table table-bordered table-hover"> 
        <tr>   <td><b>Course</b></td>
            <td><b>Lesson id</b></td>
            <td><b>Teacher</b></td>
            <td><b>Lesson start</b></td>
            <td><b>Lesson dismissed</b></td>
            <td><b>Course id</b></td>
        </tr>

        <?php
        require ('core/init.php');
        require ('core/functions/lessonFunctions.php');


        $q = intval($_GET['id']);

        echo 'qq' . $q;
        $lessons = new lessonFunctions();

        //Calling the getCourses() method to retrieve the executed query
        $result = $lessons->getLessons($q);
        // var_dump($result);

        while ($row = $result->fetch_assoc()) {
            extract($row);
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['lessonId'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['startTime'] . "</td>";
            echo "<td>" . $row['endTime'] . "</td>";
            echo "<td>" . $row['course_id'] . "</td>";
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
?>

<div class="container">
<?php if ($user_data['type'] == 1) { ?>

        <div id="addLesson">
            <p class="lead">Add lesson</p>
            <div id="lesson-form">
                <form action="#" method="post">


                    <label for="course">Course:</label>
                    <input type="text" name="courseName" id="name" />

                    <select class="form-control" name="courses" onchange="showCourse(this.value)">
                        <option value="">Select a teacher:</option>
    <?php
    $result = getTeachers();

    while ($row = $result->fetch_assoc()) {
        extract($row);
        echo "<tr>";
    echo "<OPTION value=\"" .$row['username']. "\">"       .$row['username'].".</OPTION>";
    
    }
        ?>
                        </select>

                        Example
                        <p><label style="color: #777777 !important;">2013-12-30 23:15:00</label></p>
                        <label for="course">Start time:</label>
                        <input type="text" name="startTime" id="name" />

                        <label for="course">End time:</label>
                        <input type="text" name="endTime" id="name" />

                        <input type="submit"  class="btn btn-primary" value="Create lesson" />
                    </form>
                </div>
                </nav>
            </div>
    <?php } ?>
    </div>
        <?php
        require ('includes/footer.php');
        ?>

