<?php
require ('core/init.php');
require ('includes/header.php');
require ('models/Course.php');
require ('core/functions/courseFunctions.php');
?>
<div class="row">

    <div class="col-md-10">

        <h1>Create a course</h1>

        <form class="form form-horizontal" role="form" action="makecourse.php" method="POST">
            <div class="form-group">
                <div class="col-md-3">
                    <label>Course name</label>
                    <input type="text" class="form-control" id="full-name" name="course-name" placeholder="course name">
                </div>
            </div>
          
             <div class="form-group">
                <div class="col-md-3">
            <select class="form-control" name="coursetypes" onchange="showCourse(this.value)">
                    <option value="">Select course type:</option>
                    <option value="fulltime">Voltijd</option>
                    <option value="parttime">Deelijd</option>
                    <option value="dualtime">Duaal</option>
                </select>
             </div>
            </div>

            <div class="form-group">
                <div class="col-md-3"> 
                    <label>The year where the course is given</label>
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
                </div>
            </div>

            <button type="submit" class="btn btn-default">Save</button>
        </form>

    </div>

</div>


<?php
//Checks if course-name and courseYear are set.
if (isset($_POST['course-name']) && isset($_POST['courseYear']) &&  isset($_POST['coursetypes'])) {
    $courseName = $_POST['course-name'];
    $courseyear = $_POST['courseYear'];
    $courseType=$_POST['coursetypes'];
    //Checks if courseName is filled in
    if (!empty($courseName)) {
        $courses = new courseFunctions();
        $rows = $courses->checkCourseExist($courseName, $courseyear);
        echo 'rows ' . $rows;
        if ($rows > 0) {
            echo 'De course ' . $courseName . ' bestaat voor dat jaar al.';
        } else {
            //If the course doesn't excist then we add it to the database
            // Object of the class Course.
            $course = new Course;
            $course->setCoursename($courseName);
            $course->setCategoryId($courseyear);
            $course->setCoursetype($courseType);
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