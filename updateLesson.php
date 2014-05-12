<?php
require '/core/database/connect.php';
require ('core/functions/courseFunctions.php');
require ('includes/header.php');
require ('core/functions/lessonFunctions.php');
//require ('core/functions/users.php');
?>
<script>
 
    function randomString() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 8;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	document.form1.randomfield.value = randomstring;
}
</script>
<form name="form1" method="post">
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
<?php
// Gets value of id that was sent from address bar
$lessonId = $_GET['id'];
//echo 'qq' . $lessonId;
/* $sql = "SELECT * FROM  WHERE id = '$id'";
  $result = mysql_query($sql);
  $rows = mysql_fetch_array($result); */

// Object of the class courseFunctions.
$lessons = new lessonFunctions();

//Calling the getCourses() method to retrieve the executed query
$result = $lessons->getLessonById($lessonId);
// $row = mysqli_fetch_array($result);
$row = $result;
?>

                <td align="center">
                    <input name="categoryId" type="text" id="Number" value="<?php echo $row['startTime']; ?>" size="20"/>
                </td>
                 <td align="center">
                    <input name="categoryId" type="text" id="Number" value="<?php echo $row['endTime']; ?>" size="20"/>
                </td>
                <td align="center">
                    <input name="randomfield" type="text" id="Number" value="<?php echo $row['lescode']; ?>" size="15"/>
                    <input type="button" class="btn btn-primary btn-sm" value="Generate a random password" onClick="randomString();">&nbsp;
                    
                </td>
                
            </tr>
        </table>
        <input name="course_id" type="hidden" id="id" value="<?php echo $lessonId; ?>"/>

        <br>
        
        <button type="submit" class="btn btn-default">Submit</button></td>
    <td align="center">&nbsp;</td>
</td>
</form>

<?php
//require '/core/database/connect.php';
//require ('includes/header.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['teachers']) && isset($_POST['startTime']) && isset($_POST['endTime'])&& isset($_POST['lescode'])) {
 $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    $teacherId = $_POST['teachers'];
    $lesCode=$_POST['randomfield'];

    $lesson = new Lesson();
    
     $lesson->setEndTime($endTime);
    $lesson->setStartTime($startTime);
    $lesson->setUserId($teacherId);
    $lesson->setLesCode($lesCode);
    $lessons = new lessonFunctions();
    $lessons->updateLesson($lesson);
    


}
?>

