<?php

require ('core/init.php');

$q = intval($_GET['q']);
echo $q;
$query = "SELECT `course_id`,`name` FROM `courses` WHERE `categoryId` = '" . $q . "'";
 $result = mysql_query($query);
echo"<table border='1'> 
    <tr>   <td><b>Course id</b></td>
            <td><b>Course naam</b></td>

        </tr>";

while ($row = mysql_fetch_array($result)) {

    echo "<tr>";
    echo "<td>" . $row['course_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
 