<?php
require ('./core/database/connect.php');
require ('core/functions/courseFunctions.php');
require ('includes/header.php');


// Gets value of id that was sent from address bar
$courseId = $_GET['id'];


// Object of the class courseFunctions.
$courses = new courseFunctions();

//Calling the getCourses() method to retrieve the executed query
$result = $courses->getCourseById($courseId);
// $row = mysqli_fetch_array($result);
$row = $result;
?>

<!--  <div class="form-group">
               <div class="col-md-3">
                   <label>Course name</label>
                   <input type="text" class="form-control" id="full-name" name="course-name" placeholder="course name">
               </div>
           </div>-->

<form name="form1" method="post" action="update_ac.php">
    <div class="row">
      
            <h1>Update course details</h1>
            <div class="form-group">
                <div class="col-md-3">
                    <div class="table-responsive"></div>
                    <table width="100%" border="0" cellspacing="1" cellpadding="0" >
                        <tr>
                        </tr>
                        <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center"><strong>Course name</strong></td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center"><strong>Course year</strong></td>

                        </tr>
                        <tr>
                            <td align="center">
                                <input name="name" type="text" id="Customer"  class="form-control" value="<?php echo $row['name']; ?>"size= "15"/>
                            </td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">
                                <input name="categoryId" type="text" id="Number"  class="form-control" value="<?php echo $row['categoryId']; ?>" size="15"/>
                            </td>
                        </tr>
                           <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
     

    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-3">
                <input name="course_id" type="hidden" id="id" value="<?php echo $courseId; ?>"/>
                <?php //echo $courseId; ?>
                <?php //echo $row['name']; ?>
                <?php //echo $row['categoryId']; ?>
                <button type="submit" name="Submit" value="Submit" class="btn btn-default" >Save</button>
            </div>
        </div>
    </div>


</form>
<?php
require ('includes/footer.php');
?>