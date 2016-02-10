<?php
	include("validateadmin.php");
?>
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
			require("dbaction/dbRetrieveInfo.php");
			
			$showlist = getAllShows();
			
		?>
		
		<div class="content-item">
			<div class="thumb-wrap">
				<h2>Edit Show Information</h2>
				<form action="editShow.php" id="editshow">
				  <select name="showId" form="editshow">
					  <option value="create">Add New Show</option>
					  <?php
						foreach($showlist as $show) { ?>
							<option value=<?=$show['ShowID']?> ><?=$show['Title']?></option>
						<?php } ?>
					</select>
					<input type="submit" value="Go" />
				</form>
				<h2>Edit News Article</h2>
				<form action="newseditor.php" id="editnews">
					<select name="articleID" form="editnews">
						<option value="create">Add New Article</option>
					</select>
					<input type="submit" value="Go" />
				</form>
			</div>
			<div class="thumb-wrap">
				<h2>Other Actions</h2>
				<p><a href="biomanager.php">Manage Biographies</a></p>
				<p><a href="accountmanager.php">Manage Accounts</a></p>
				<p><a href="photomanager.php">Manage Photos</a></p>
			</div>
		</div>		
	</div>
</body>
</html>