<?php
require ('core/init.php');
include ('includes/header.php');
	?>	
	<form class="form-signin" role="form" action="login.php" method="post">
		<h2 class="form-signin-heading">Sign In</h2>
		<input type="text" class="form-control" name="username" placeholder="username" required autofocus>
		<input type="password" class="form-control" name="password" placeholder="password" required>
		<button class="btn btn-s btn-primary btn-block" type="submit">Sign in</button>
	</form>
	<?php
include ('includes/footer.php');
?>	