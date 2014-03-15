<?php

require ('core/init.php');
require ('includes/header.php');
require ('models/Course.php');
require ('core/functions/courseFunctions.php');
?>
<p class="lead">Create a course</p>
<form class="form-horizontal" action="makecourse.php" method="POST">
    <fieldset>
        <!-- course-name input-->
        <div class="control-group">
            <label class="control-label">Course name</label>
            <div class="controls">
                <input id="full-name" name="course-name" type="text" placeholder="course name"
                       class="input-xlarge">
                <p class="help-block"></p>
            </div>
        </div>
        <label class="control-label">The year where the course is given</label>
        <div class="radio">
            <label>
                <input type="radio" name="courseYear" id="optionsRadios1" value="1" checked>
                Year 1
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="courseYear" id="optionsRadios2" value="2">
                Year 2
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="courseYear" id="optionsRadios2" value="3">
                Year 3
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="courseYear" id="optionsRadios2" value="4">
                Year 4
            </label>
        </div>
        <button class="defaultbtn spacing-top">Save</button>
    </fieldset>
</form>

<?php

//Checks if course-name and courseYear are set.
if (isset($_POST['course-name']) && isset($_POST['courseYear'])) {
    $courseName = $_POST['course-name'];
    $courseyear = $_POST['courseYear'];
    //   echo 'test ' . $courseName . $courseyear;
    
    //Checks if courseName is filled in
    if (!empty($courseName)) {
        $courses = new courseFunctions();
        $rows = $courses->checkCourseExist($courseName, $courseyear);
        echo 'rows '. $rows;
      //  echo 'result'. empty($result);
      //  echo "sdfg". $result;
        if ($rows > 0) {
            echo 'De course ' . $courseName . ' bestaat voor dat jaar al.';
        }
        else {
            //If the course doesn't excist then we add it to the database
            // Object of the class Course.
            $course = new Course;
            $course->setCoursename($courseName);
            $course->setCategoryId($courseyear);
            
            $courses->addCourse($course);
        }
    } else {
        echo 'Voer een course name in';
    }
}
?>
<?php

require ('includes/footer.php');
?>