<!DOCTYPE html>
<?php
//This page is included throughout the website. It contains the links to all stylesheets and javascript. it also contains the navbar.
include_once './core/functions/users.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aanwezigheids Registratie</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/core.css" rel="stylesheet">
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon"/>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    
     
  </head>
	<body>
	
            <img id="fs_bg"src="image/fs bg.jpg">
             <div class="container">
            <!-- row 1: navigation -->
			<?php if (logged_in() == true && $user_data['type'] == 1) { ?>
            <div class="row">
                <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="courses.php">Voltijd</a></li>
                            <li ><a href="coursesParttime.php">Deeltijd</a></li>
                            <li ><a href="coursesDualtime.php">Duaal</a></li>
                        </ul>
                    </div>  
                </nav>
            </div> <?php } ?>
        
        </div> <!-- end container -->
		<div class="container">
