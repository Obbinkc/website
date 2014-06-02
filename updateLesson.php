<?php
require ('./core/database/connect.php');
require ('core/functions/courseFunctions.php');
require ('includes/header.php');
require ('core/functions/lessonFunctions.php');
require ('models/Lesson.php');
//require ('core/functions/users.php');
?>
<script>

    function randomString() {
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 8;
        var randomstring = '';
        for (var i = 0; i < string_length; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum, rnum + 1);
        }
        document.form1.randomfield.value = randomstring;
    }
</script>
<form name="form1" method="post" action="updateLesson.php">
    <td>
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
                <td>&nbsp;</td>
                <td colspan="6"><strong>Update lesson details</strong> </td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td align="center"><strong>Course</strong></td>
                <td align="center"><strong>Teacher</strong></td>
                <td align="center"><strong>Lesson start</strong></td>
                <td align="center"><strong>Lesson dismissed</strong></td>
                <td align="center"><strong>Lesson code</strong></td>

            </tr>
            <tr>
                <td>&nbsp;</td>

                <td align="center">
                    <select class="form-control" name="courses" >
                        <option value="">Select a course:</option>
                        <?php
                        $courseFunction = new courseFunctions();
                        $courses = $courseFunction->getCourses();

                        $selectedCourse = $_GET['course'];
                        echo "selectedCourse" . $selectedCourse;
                        while ($row = $courses->fetch_assoc()) {
                            extract($row);
                            if ($selectedCourse == $row['name']) {
                                echo "<OPTION selected value=\"" . $row['course_id'] . "\">" . $row['name'] . ".</OPTION>";
                            }
                            if ($selectedCourse != $row['name']) {
                                echo "<OPTION value=\"" . $row['course_id'] . "\">" . $row['name'] . ".</OPTION>";
                            }
                        }
                        ?>
                    </select>
                </td>

                <td align="center">
                    <select class="form-control" name="teachers" >
                        <option value="">Select a teacher:</option>
                        <?php
                        $selectedTeacher = $_GET['teacher'];
                        $result = getTeachers();
                        while ($row = $result->fetch_assoc()) {
                            extract($row);
                            if ($selectedTeacher == $row['username']) {
                                echo "<OPTION  selected value=\"" . $row['user_id'] . "\">" . $row['username'] . ".</OPTION>";
                            }
                            if ($selectedTeacher != $row['username']) {
                                echo "<OPTION value=\"" . $row['user_id'] . "\">" . $row['username'] . ".</OPTION>";
                            }
                        }
                        ?>
                    </select>
                </td>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $lessonId = $_POST["lessonId"];
                   // echo "IK BEN VAN DE FORM" . $lessonId;
                } else {
                    // Gets value of id that was sent from address bar
                    $lessonId = $_GET['id'];
                    //   echo"ik ben van de URL" . $lessonId;
                }

                // Object of the class lessonFunctions.
                $lessons = new lessonFunctions();
                //Calling the getLessonById() method to retrieve the starttime, endtime and lessoncode of a lesson.
                $result = $lessons->getLessonById($lessonId);
                $row = $result;
                ?>

                <td align="center">
                    <input name="startTime" type="text" id="startTime" value="<?php echo $row['startTime']; ?>" size="20"/>
                </td>
                <td align="center">
                    <input name="endTime" type="text" id="endTime" value="<?php echo $row['endTime']; ?>" size="20"/>
                </td>
                <td align="center">
                    <input name="randomfield" type="text" id="lescode" value="<?php echo $row['lescode']; ?>" size="15"/>
                    <input type="button" class="btn btn-primary btn-sm" value="Generate a random password" onClick="randomString();">&nbsp;
                </td>
            </tr>
        </table>
        <input name="lessonId" type="hidden" id="lessonId" value="<?php echo $lessonId; ?>"/>
        <br>
        <button type="submit" class="btn btn-default">Submit</button></td>
    <td align="center">&nbsp;</td>
</td>
</form>
<?php
if (isset($_POST['teachers']) && isset($_POST['startTime']) && isset($_POST['endTime']) && isset($_POST['randomfield'])) {
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    $teacherId = $_POST['teachers'];
    $lesCode = $_POST['randomfield'];
    $courseID = $_POST['courses'];

    if (!empty($startTime) && !empty($endTime) && !empty($teacherId) && !empty($lesCode) && !empty($courseID)) {
        //Creates a lessonFunctions object
        $lessons = new lessonFunctions();
        //Calling the getTimesOfTeacher() method to retrieve all the starttimes and endtimes of a teacher
        $query = $lessons->getTimesOfTeacher($teacherId);
        $tijdGoedgekeurd = true;
        /* fetch object array until there are no rows left */
        while ($value = $query->fetch_object()) {
            if ($startTime >= $value->startTime && $startTime <= $value->endTime) {
                echo 'De gekozen starttijd is helaas niet beschikbaar';
                $tijdGoedgekeurd = false;
            } else if ($endTime >= $value->startTime && $endTime <= $value->endTime) {
                echo 'De gekozen eindtijd is helaas niet beschikbaar';
                $tijdGoedgekeurd = false;
            }
            if (!$tijdGoedgekeurd) {
                break;
            }
        }
        if ($tijdGoedgekeurd) {
            //Creates a Lesson object
            $lesson = new Lesson();
            $lesson->setLessonId($lessonId);
            $lesson->setCourse_id($courseID);
            $lesson->setEndTime($endTime);
            $lesson->setStartTime($startTime);
            $lesson->setUserId($teacherId);
            $lesson->setLesCode($lesCode);
            $lessons = new lessonFunctions();
            $lessons->updateLesson($lesson);
        }
    } else {
        echo 'voer de velden in';
    }
}
?>

