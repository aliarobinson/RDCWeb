<?php
	include("validateadmin.php");
	
	require_once("rdcwebconstants.php");
	require_once("dbaction/dbRetrieveInfo.php");
	require_once("printUtils.php");
	require_once("infoUtils.php");

	//Get the information for an existing show
	$info = null;
	$dates = null;
	$logos = null;
	
	if(isset($_GET["showId"])) {
		$sid = $_GET["showId"];
		if($sid != "create") {
			$info = getShowInfo($sid);
			$dates = getShowDates($sid);
			$logos = getShowLogos($sid);
		}
	}		
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Show - Rose Drama Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="styles/rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php include("header.html");
			
			printAllMembersDatalist();
			
		?>
		<div class="content-item">
			<form action="dbaction/saveShowInfo.php" id="saveShow" name="saveShow" method='post'>
				<input id="script-type" type="hidden" value="mainstage" />
				<?php 
					if(isset($sid)) { ?>
					<input id="id-input" type="hidden" name="showId" value=<?=$sid?> />
				<?php } 
					
					printBasicInputBlock($info);
					printDateInputBlock($dates); ?>
					
					<div class="content-item">
						<div class="thumb-wrap">
							<h3>Logo Banner</h3>
							<?php
								if(isset($logos["Banner"])): ?>
								<img src='<?=IMAGEDIR . "/" . $logos["Banner"]?>' alt="Logo Banner"></img>
							<?php endif; ?>
							<p><input id="edit-banner" class="button" type="button" value="Edit"></p>
						</div>
						<div class="thumb-wrap">
							<h3>Logo Thumbnail</h3>
							<?php
								if(isset($logos["Thumbnail"])): ?>
								<img src='<?=IMAGEDIR . "/" . $logos["Thumbnail"]?>' alt="Logo Thumbnail"></img>
							<?php endif; ?>
							<p><input id="edit-thumbnail" class="button" type="button" value="Edit"></p>
						</div>
					</div>
					
					<?php
					//include("photoselector.php");
					?>
					
					<div class="content-item">
						<h2>Cast and Crew</h2>
							<table id="members-table">
							<tr><td>Member Name</td><td>Role</td><td>Role Type</td>
							<!-- The restrictions on these inputs are so specific that I'm just going to use javascript to add them --></table>
						<input id="add-cast-input" class="button" type="button" value="Add"><input id="save-show-info" class="button" type="submit" value="Save">
					</div>
			</form>
			
			<div class="popup" id="save-show-dialog" hidden>
				<img src="stock/loading.gif"></img>
			</div>
		</div>
		
		
	</div>
</body>
</html>
<script src="plugins/jquery-1.12.1.min.js" type="text/javascript"></script>
<script src="plugins/bpopup.min.js" type="text/javascript"></script>
<script src="scripts/editShow.js" type="text/javascript"></script>
<script src="scripts/saveShow.js" type="text/javascript"></script>