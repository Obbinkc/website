<?php
require '/core/database/connect.php';
require ('core/functions/courseFunctions.php');
require ('includes/header.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// Gets value of id that was sent from address bar
$courseId = $_GET['id'];

/*$sql = "SELECT * FROM  WHERE id = '$id'";
$result = mysql_query($sql);
$rows = mysql_fetch_array($result);*/

         // Object of the class courseFunctions.
        $courses = new courseFunctions();
     
        //Calling the getCourses() method to retrieve the executed query
        $result =$courses->getCourseById($courseId);
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
                    <td align="center"><strong>Course name</strong></td>
                    <td align="center"><strong>Course year</strong></td>
                  
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="center">
                        <input name="name" type="text" id="Customer" value="<?php echo $row['name']; ?>"size= "15"/>
                    </td>
                    <td align="center">
                        <input name="categoryId" type="text" id="Number" value="<?php echo $row['categoryId']; ?>" size="15"/>
                    </td>
                   
                <tr>
            </table>
            <input name="course_id" type="hidden" id="id" value="<?php echo $courseId; ?>"/>
           <?php echo $courseId; ?>
            <?php echo $row['name']; ?>
            <?php echo $row['categoryId']; ?>
            <input type="submit" name="Submit" value="Submit" /></td>
        <td align="center">&nbsp;</td>
        </td>
    </form>
