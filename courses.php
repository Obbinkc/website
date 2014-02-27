<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require ('core/init.php');
require ('includes/header.php');
?>
<?php if (logged_in() == true) { ?>

    <p class="lead">Vakken</p>
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <div id="leftside_menu">
        <div class="col-md-4 col-lg-offset-0">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Jaar 1</a></li>
                <li><a href="#">Jaar 2</a></li>
                <li><a href="#">Jaar 3</a></li>
                <li><a href="#">Jaar 4</a></li>
            </ul> 
        </div>
    </div>
   

        <table class="table table-hover">
            <tr>
                <td><b>Course id</b></td>
                <td><b>Course naam</b></td>
               
            </tr>
            <?php

            function fillTable($courseId, $courseName) {
                $HTML = '';
                $HTML .= '<tr>';
                $HTML .= '<td>' . $courseId . '</td>';
                $HTML .= '<td>' . $courseName . '</a></td>';
                $HTML .= '</tr>';
                echo $HTML;
            }

            $result = mysql_query("SELECT `course_id`,`name` FROM `courses` ");
            while ($row = mysql_fetch_array($result)) {
                $courseId = $row['course_id'];
                $courseName = $row['name'];

                fillTable($courseId, $courseName);
            }
            ?>
        </table>
   
    <?php
} else {
    include ('home.php');
}
?>
<div class="container"></div>

<?php
require ('includes/footer.php');
?>