<?php
	include("validateadmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Short Plays - Rose Drama Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
			require("dbaction/dbRetrieveInfo.php");
			require("infoUtils.php");
			require("printUtils.php");

			//Get the information for an existing show
			if(isset($_GET["setId"])) {
				$sid = $_GET["setId"];
				
			}
			
			printAllMembersDatalist();
		?>
		
		<div class="content-item">
			<form action="dbaction/saveShortPlaySet.php" id="saveShow" name="saveShow" method='post'>
				<input id="script-type" type="hidden" value="shortplay" />
				<?php 
					if(isset($sid)) { ?>
					<input type="hidden" name="showId"> 
				<?php } 
					printDateInputBlock(array());
				?>
				<div id="show-forms">
				</div>
				<input id="add-show" type="button" value="Add Show">
				<input id="save-show-info" type="submit" value="Save">
			</form>
		</div>
		
		
	</div>
</body>
</html>
<script src="scripts/editShow.js"></script>