<?php
	require ('core/init.php');
	require ('includes/header.php');
//$user=new UserFunctions();
	if (/*$user->*/logged_in() == true) {
		include ('loggedin.php');
	} else {
		include ('loginform.php');
	}

	require ('includes/footer.php');
?>