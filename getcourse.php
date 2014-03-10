<div class="table-responsive">
    <table class=" table table-bordered table-hover"> 
        <tr>   <td><b>Course id</b></td>
            <td><b>Course naam</b></td>
           
        </tr>
        
        <?php
        require ('core/init.php');
        require ('core/functions/courseFunctions.php');
        $q = intval($_GET['q']);
        $courses = new courseFunctions();
       
        $result =$courses->getCourses($q);


        while ($row = mysql_fetch_array($result)) {

            echo "<tr>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            $courseId=$row['course_id'];
             if ($user_data['type'] == 1) { 
            echo '<td><a onclick="return confirm(\'Delete course? \')" href="deleteCourse.php?id='.$courseId.'">delete</td>';
             echo '<td><a href="updateCourse.php?id='.$courseId.'">update</td>';
            echo "</tr>";
        }
        }
       
        ?>
    </table>
</div>