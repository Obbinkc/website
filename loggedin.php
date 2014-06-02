
<h2>Hello, <?php echo $user_data['username']; //$_SESSION['user_id'][0];   ?>!</h2>

<p>You are logged in<a href="logout.php"> Logout</a></p>

<?php if ($user_data['type'] == 1) { ?>
    <p>You can make a course here<a href="makecourse.php"> Make Course</a></p>

<?php } else {?>
  <div class="lessonform">
	<form class="input-group" role="form" action="reglesson.php" method="post">
		<input type="text" class="form-control" name="lessonnumber" placeholder="register to lesson" required autofocus>
		<span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Submit</button>
        </span>
	</form>
  </div>  
<?php } ?>


