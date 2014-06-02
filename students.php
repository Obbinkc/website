<?php
//This page shows the students that are registered to a specific lesson.
require ('core/init.php');
require ('core/functions/lessonFunctions.php');
include ('includes/header.php');
	

	$students = $_GET['id'];
	$result = students($students);
	?>
	<!-- Students shown in a table. -->				
	<div class="table-responsive">
		<table class=" table table-bordered table-hover"> 
			<tr>   
				<td><b>Voornaam</b></td>
				<td><b>Achternaam</b></td>
			</tr>
				<?php while ($row = $result->fetch_assoc()) {
						extract($row);
						echo "<tr>";
						echo "<td>" . $row['first_name'] . "</td>";
						echo "<td>" . $row['last_name'] . "</td>"; }?>
		</table>
	</div> <?php
	
	
include ('includes/footer.php');
?>