<?php
require ('core/init.php');
require ('includes/header.php');
require ('models/Lesson.php');
require ('core/functions/courseFunctions.php');
?>
<script>
    $(document).ready(function() {
        $('#addLesson p').click(function() {
            $('#lesson-form').slideToggle(300);
            $(this).toggleClass('close');
        });
    });
    function randomString() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 8;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	document.randform.randomfield.value = randomstring;
}
</script>

<div class="table-responsive">
    <table class=" table table-bordered table-hover"> 
        <tr>   <td><b>Course</b></td>
            <td><b>Lesson id</b></td>
            <td><b>Teacher</b></td>
            <td><b>Lesson start</b></td>
            <td><b>Lesson dismissed</b></td>
            <td><b>Course id</b></td>
            <td><b>Lesson code</b></td>
        </tr>

        <?php
        require ('core/functions/lessonFunctions.php');

        
        $q = intval($_GET['id']);
        //$q = $_GET['id'];

        //echo 'qq' . $q;
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
             echo "<td>" . $row['lescode'] . "</td>";
            $courseId = $row['course_id'];
            $lessonId=$row['lessonId'];
            
			$lescode = $row['lescode'];
            if ($user_data['type'] == 1) {
                echo '<td><a onclick="return confirm(\'Delete course? \')" href="deleteLesson.php?id=' . $lessonId . '">delete</td>';
                echo '<td><a href="updateLesson.php?id=' . $courseId . '">update</td>';
				echo '<td><a href="students.php?id=' . $lescode . '">students</td>';
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
                <form action="#" method="post" name="randform">


                    <label for="course">Course:</label>
                    <input type="text" name="courseName" id="name" />
                     <br>
                    <select class="form-control" name="teachers" >
                        <option value="">Select a teacher:</option>
                        <?php
                        $result = getTeachers();

                        while ($row = $result->fetch_assoc()) {
                            extract($row);
                           // echo "<tr>";
                            echo "<OPTION value=\"" . $row['user_id'] . "\">" . $row['username'] . ".</OPTION>";
                        }
                        ?>
                    </select>
                     <br>
                    Example
                    <label style="color: #777777 !important;">2013-12-30 23:15:00</label>
                    <label for="course">Start time:</label>
                    <input type="text" name="startTime" id="name" />

                    <label for="course">End time:</label>
                    <input type="text" name="endTime" id="name" />
                    <br>
                    <input type="button" class="btn btn-primary btn-sm" value="Generate a random password" onClick="randomString();">&nbsp;
                    <input type="text" name="randomfield" value="">
                    <br>
                    <input type="submit"  class="btn btn-primary" value="Create lesson" />
                </form>
            </div>
            </nav>
        </div>
    <?php } ?>
</div>

<?php
if (isset($_POST['courseName']) && isset($_POST['teachers']) && isset($_POST['startTime']) && isset($_POST['endTime'])) {

    $courseName = $_POST['courseName'];
   // $courseyear = $_POST['courseYear'];
   // $teacher = $_POST['teachers'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    $teacherId = $_POST['teachers'];
    $lesCode=$_POST['randomfield'];
    $courses = new courseFunctions();

    $courseID = $courses->getCourseId($courseName);

    $lesson = new Lesson();
    //$lesson->setLessonId();
    $lesson->setCourse_id($courseID);
    $lesson->setEndTime($endTime);
    $lesson->setStartTime($startTime);
    $lesson->setUserId($teacherId);
    $lesson->setLesCode($lesCode);
    $lessons = new lessonFunctions();

    $lessons->addLesson($lesson);
   
}
?>




<?php
require ('includes/footer.php');
?>

