<!DOCTYPE html>
<html lang="en">
<head>
  <title>Biography Manager - Rose Drama Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
			require("dbaction/dbRetrieveInfo.php");
			
			$showlist = getAllShows();
			
		?>
		
		<div class="content-item">
			<h2>Edit Biography</h2>
			<div id="selectWrapper" class="content-item" >
				<select id="showSelect">
					<option value=''>Select Show</option>
					<option value="0">None (Member Bio)</option>
					<?php
					foreach($showlist as $show) { ?>
						<option value=<?=$show['ShowID']?> ><?=$show['Title']?></option>
					<?php } ?>
				</select>
				<select id="memberSelect">
					<option>Select Member</option>
				</select>
			</div>
			<textarea id="biographyInput"></textarea>
			<p id="charCount"></p>
			<p id="errorDisplay" class="error" ></p>
			
			<button id="saveButton">Save</button>
		</div>
		
	</div>
</body>
</html>
<script src="scripts/biomanager.js"></script>