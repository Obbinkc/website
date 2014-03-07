<?php
	require ('core/init.php');
	require ('includes/header.php');

	if (logged_in() == true) {
		include ('loggedin.php');
	} else {
		include ('loginform.php');
	}

	require ('includes/footer.php');
?>