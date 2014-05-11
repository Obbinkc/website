
	<div class="center-block">
	 
		<form class="form-signin" role="form" action="login.php" method="post">
			<h2 class="form-signin-heading">Sign In</h2>
			<input type="text" class="form-control" name="username" placeholder="username" required autofocus>
			<input type="password" class="form-control" name="password" placeholder="password" required>
			<button class="btn btn-s btn-primary btn-block" type="submit">Sign in</button>
		</form>
		
		<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">
			Sign up!
		</button>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Sign up form</h4>
			  </div>
				  <div class="modal-body">
					<form class="form-signin" role="form" action="register.php" method="post">
						<h2 class="form-signin-heading">Sign up</h2>
						<input type="text" class="form-control" name="username" placeholder="username" required autofocus><br>
						<input type="password" class="form-control" name="password" placeholder="password" required><br>
						<input type="password" class="form-control" name="password_again" placeholder="retype password" required><br>
						<input type="text" class="form-control" name="first_name" placeholder="first name" required><br>
						<input type="text" class="form-control" name="last_name" placeholder="last name" required><br>
						<input type="text" class="form-control" name="email" placeholder="email" required>
				  </div>
				  <div class="modal-footer">
					<button class="btn btn-s btn-primary btn-block" type="submit">Sign up</button>
				  </div>
					</form>
			</div>
		  </div>
		</div>
		
	</div>
