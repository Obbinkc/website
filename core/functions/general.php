<?php
//clear data send to database of any special characters
function sanitize ($data) {
	return mysql_real_escape_string ($data);
}
?>