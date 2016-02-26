<?php
	//include("validateadmin.php");
	//require("dbaction/dbRetrieveInfo.php");
	require("templates/printUtils.php");

	//Get the information for an existing show
	if(isset($_GET["setId"])) {
		$sid = $_GET["setId"];
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Short Plays - Rose Drama Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="styles/rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php include ("header.html");
			
			//printAllMembersDatalist();
		?>
		
		<div class="content-item">
			<form action="dbaction/saveShortPlaySet.php" id="saveShow" name="saveShow" method='post'>
				<input id="script-type" type="hidden" value="shortplay" />
				<?php 
					if(isset($sid)) { ?>
					<input type="hidden" name="showId"> 
				<?php } 
					//Include the template for inputting a set of dates
					include("templates/datesInputBlock.php");
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
<script src="plugins/jquery-1.12.1.min.js" type="text/javascript"></script>
<script src="plugins/bpopup.min.js" type="text/javascript"></script>
<!--script src="scripts/editShow.js" type="text/javascript"></script-->
<script src="scripts/editDates.js" type="text/javascript"></script>
<script src="scripts/editShortPlays.js" type="text/javascript"></script>
<script src="scripts/editRoles.js" type="text/javascript"></script>
<script src="scripts/saveShow.js" type="text/javascript"></script>