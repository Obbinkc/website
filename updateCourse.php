<?php
require '/core/database/connect.php';
require ('core/functions/courseFunctions.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// get value of id that sent from address bar
$courseId = $_GET['id'];

/*$sql = "SELECT * FROM  WHERE id = '$id'";
$result = mysql_query($sql);
$rows = mysql_fetch_array($result);*/

//vanaf hier van mij
        $courses = new courseFunctions();
       
        $result =$courses->getCourseById($courseId);
        $row = mysql_fetch_array($result);


?>

<table width="1200" border="0" cellspacing="1" cellpadding="0">
    <tr>
    <form name="form1" method="post" action="update_ac.php">
        <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="6"><strong>Update Porting Details</strong> </td>
                </tr>
                <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center"><strong>Customer</strong></td>
                    <td align="center"><strong>Number</strong></td>
                  
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="center">
                        <input name="Customer" type="text" id="Customer" value="<?php echo $row['name']; ?>"size= "15"/>
                    </td>
                    <td align="center">
                        <input name="Number" type="text" id="Number" value="<?php echo $row['categoryId']; ?>" size="15"/>
                    </td>
                   
                <tr>
            </table>
            <input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>"/>
            <input type="submit" name="Submit" value="Submit" /></td>
        <td align="center">&nbsp;</td>
        </td>
    </form>
