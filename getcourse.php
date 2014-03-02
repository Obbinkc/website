<div class="table-responsive">
    <table class=" table table-bordered table-hover"> 
        <tr>   <td><b>Course id</b></td>
            <td><b>Course naam</b></td>

        </tr>
        <?php
        require ('core/init.php');

        $q = intval($_GET['q']);

        $query = "SELECT `course_id`,`name` FROM `courses` WHERE `categoryId` = '" . $q . "'";
        $result = mysql_query($query);


        while ($row = mysql_fetch_array($result)) {

            echo "<tr>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>