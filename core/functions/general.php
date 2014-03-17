<?php


//clear data send to database of any special characters
function sanitize ($data) {
    $link = mysqli_connect("145.92.203.240", "huraibz001", "welkommij3!", "zhuraibz001");
	//return mysql_real_escape_string ($data);
    return mysqli_real_escape_string ($link,$data);
}



?>