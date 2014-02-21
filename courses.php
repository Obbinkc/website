<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require ('core/init.php');
require ('includes/header.php');
?>
<?php if (logged_in() == true) { ?>

    <p class="lead">Vakken</p>
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <div id="leftside_menu">
    <div class="col-md-4 col-lg-offset-0">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="#">Jaar 1</a></li>
            <li><a href="#">Jaar 2</a></li>
            <li><a href="#">Jaar 3</a></li>
            <li><a href="#">Jaar 4</a></li>
        </ul> 
    </div>
        </div>
    <?php

} else {
    include ('home.php');
}
?>


<?php

require ('includes/footer.php');
?>

