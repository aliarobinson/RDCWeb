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
			require("printUtils.php");

			//Get the information for an existing show
			if(isset($_GET["setId"])) {
				$sid = $_GET["setId"];
				
			}
			
		?>
		
		<div class="content-item">
			<form action="dbaction/saveShortPlays.php" id="saveShow" name="saveShow" method='post'>
				<?php 
					if(isset($sid)) { ?>
					<input type="hidden" name="showId"> 
				<?php } 
					printDateInputBlock(array());
				?>
			</form>
		</div>
		
		
	</div>
</body>
</html>
<script src="scripts/editShow.js"></script>