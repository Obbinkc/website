<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require ('core/init.php');
require ('includes/header.php');

//searchbar code aangepast
//<form class="navbar-form navbar-right" role="search" method="post" action="searchresults.php">
      //<div class="form-group">
     //       <input type="text" class="form-control" placeholder="Search">
     //   </div>
      //  <button type="submit" class="btn btn-default">Submit</button>
        
  //  </form>

if (logged_in() == true) { ?>

    <p class="lead">Vakken deeltijd</p>
    
   <!-- SEARCH FORM
   <h4 class="text-right">Search                </h4>
    <form class="navbar-form navbar-right" name="form1" method="post" action="searchresults.php">
        <input name="search" type="text" size="40"/>
        <input type="submit" name="Submit" value="Submit"/>
        
    </form>   --> 
         
    <div id="leftside_menu">
        <div class="col-md-4 col-lg-offset-0">
            <form>
                <select class="form-control" name="courses" onchange="showCourse(this.value)">
                    <option value="">Select a year:</option>
                    <option value="1">Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                    <option value="4">Year 4</option>
                </select>
            </form>
            <br>
            <div id="txtHint"><b>All courses of a year will be listed here.</b></div>
        </div>
    </div>

        <script>
                    function showCourse(str)
                    {
                        if (str == "")
                        {
                            document.getElementById("txtHint").innerHTML = "";
                            return;
                        }
                        if (window.XMLHttpRequest)
                        {// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        }
                        else
                        {// code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function()
                        {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                            {
                                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                            }
                        }
                        xmlhttp.open("GET", "getParttimecourses.php?q=" + str, true);
                        xmlhttp.send();
                    }

        </script>
     
     
    <?php
} else {
    include ('loginform.php');
}
?>


