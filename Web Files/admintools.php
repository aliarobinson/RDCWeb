<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rose Drama Club - Rose-Hulman Institute of Technology</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
		?>
		
		<div class="content-item">
			<h2>Edit Show Information</h2>
			<form action="editShow.php" id="editshow">
			  <select name="showId" form="editshow">
				  <option value="create">Add New Show</option>
				</select>
				<input type="submit" value="Go" />
			</form>
		</div>
		
	</div>
</body>
</html>