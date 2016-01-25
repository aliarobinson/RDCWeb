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

			//Get the information for an existing show
			if(isset($_GET["showId"])) {
				$sid = $_GET["showId"];
			}
			
		?>
		<div class="content-item">
			<form action="dbaction/saveShowInfo.php" id="saveShow" method='post'>
				<?php 
					if(isset($sid)) { ?>
					<input type="hidden" name="showId"> 
					<?php } ?>
				<h2>General Information</h2>
				<div>Title (Required):<input type="text" name="showTitle" ></div>
				<div>Subtitle (Not required):<input type="text" name="showSubtitle" ></div>
				<div>Synopsis (Max 800 characters):<textarea name="showSynopsis" form="saveShow"></textarea></div>
				
				<h2>Web Logos</h2>
				<!-- TODO -->
				
				<h2>Performance Dates</h2>
				<div id="performance-date-container" >
					<?php
						//This assumes that most rdc productions will have 5 performances.
						for($j = 0; $j < 5; $j++) { ?>
							<input type="datetime-local" name="showDate[]" /> <br>
						<?php } ?>
				</div>
				<input type="button" id="add-date-input" value="Add">
				
				<h2>Cast and Crew</h2>
					<table id="members-table">
					<tr><td>Member Name</td><td>Role</td><td>Role Type</td>
					<!-- The restrictions on these inputs are so specific that I'm just going to use javascript to add them --></table>
				<input type="submit">
			</form>
		</div>
		
		
	</div>
</body>
</html>
<script src="scripts/editShow.js"></script>