
<h2>Hello, <?php echo $user_data['username']; //$_SESSION['user_id'][0];   ?>!</h2>

<p>You are logged in<a href="logout.php"> Logout</a></p>

<?php if ($user_data['type'] == 1) { ?>
    <p>You can make a course here<a href="makecourse.php"> Make Course</a></p>

<?php } else {?>
<div class="row">
	<div class="col-xs-4">
	<form class="input-group" role="form" action="reglesson.php" method="post">
		<input type="text" class="form-control" name="lessonnumber" placeholder="register to lesson" required autofocus>
		<span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Submit</button>
        </span>
	</form>
  </div>
</div>  
<?php } ?>







<br>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Collapsible Group Item #1
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php echo $user_data['first_name']; ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Collapsible Group Item #2
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <?php echo $user_data['last_name']; ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    Collapsible Group Item #3
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <?php echo $user_data['email']; ?>
            </div>
        </div>
    </div>
</div>
