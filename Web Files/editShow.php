<?php
	include("validateadmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Show - Rose Drama Club</title>
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
			if(isset($_GET["showId"])) {
				$sid = $_GET["showId"];
				
				$info = getShowInfo($sid);
			}
			
		?>
		<div class="content-item">
			<form action="dbaction/saveShowInfo.php" id="saveShow" name="saveShow" method='post'>
				<?php 
					if(isset($sid)) { ?>
					<input type="hidden" name="showId"> 
				<?php } 
				
					printBasicInputBlock($info);
					printDateInputBlock(array());
					printMemberInputBlock();
				?>
			</form>
		</div>
		
		
	</div>
</body>
</html>
<script src="scripts/editShow.js"></script>