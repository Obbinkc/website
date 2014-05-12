<?php
require '/core/database/connect.php';
require ('core/functions/courseFunctions.php');
require ('includes/header.php');
require ('core/functions/lessonFunctions.php');
//require ('core/functions/users.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// Gets value of id that was sent from address bar
$lessonId = $_GET['id'];
//echo 'qq' . $lessonId;
/*$sql = "SELECT * FROM  WHERE id = '$id'";
$result = mysql_query($sql);
$rows = mysql_fetch_array($result);*/

         // Object of the class courseFunctions.
        $lessons = new lessonFunctions();
     
        //Calling the getCourses() method to retrieve the executed query
        $result =$lessons->getLessonById($lessonId);
       // $row = mysqli_fetch_array($result);
        $row =$result;


?>
    <form name="form1" method="post" action="update_ac.php">
        <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="6"><strong>Update course details</strong> </td>
                </tr>
                <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center"><strong>Teacher</strong></td>
                    <td align="center"><strong>Lesson start</strong></td>
                       <td align="center"><strong>Lesson dismissed</strong></td>
                       <td align="center"><strong>Lesson code</strong></td>
                  
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="center">
                           <select class="form-control" name="teachers" >
                        <option value="">Select a teacher:</option>
                        <?php
                        $result = getTeachers();
                       // echo'geteachers'.$result;
                        //var_dump($result);
                        while ($row = $result->fetch_assoc()) {
                            extract($row);
                           // echo "<tr>";
                            echo "<OPTION value=\"" . $row['user_id'] . "\">" . $row['username'] . ".</OPTION>";
                        }
                        ?>
                    </select>
                    </td>
                    <td align="center">
                        <input name="categoryId" type="text" id="Number" value="<?php echo $row['startTime']; ?>" size="15"/>
                    </td>
                   
                </tr>
            </table>
            <input name="course_id" type="hidden" id="id" value="<?php echo $lessonId; ?>"/>
           <?php echo $lessonId; ?>
            <?php echo $row['name']; ?>
            <?php echo $row['categoryId']; ?>
            <input type="submit" name="Submit" value="Submit" /></td>
        <td align="center">&nbsp;</td>
        </td>
    </form>
