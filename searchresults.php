<?php
require ('core/init.php');
require ('includes/header.php');
?>





<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<h2>Search Results</h2>

<?php


if (isset($_POST['search'])) {
    //header("Location:courses.php");
    $search = $_POST['search'];

    /* @var $POST type */
    $search_sql = "SELECT * FROM courses WHERE name = '" . $search . "'";
    $search_query = mysql_query($search_sql);

    if (mysql_num_rows($search_query) > 0) {
        $search_rs = mysql_fetch_assoc($search_query);
        do {
            echo $search_rs['name'] . "<br>";
        } while ($search_rs = mysql_fetch_assoc($search_query));
    }
}

?>
       

<?php 
if (mysql_num_rows($search_query) > 0) {
    do {
        ?>
                <P><?php echo $search_rs['name'] . "<br>" ; ?></p>   

            <?php
            } while ($search_rs = mysql_fetch_assoc($search_query));
        } else {
            echo "LOL No results found";
        }
        ?>
    </body>

</html>
