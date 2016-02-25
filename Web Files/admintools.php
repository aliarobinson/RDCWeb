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
  <link href="accordion.css" rel="stylesheet">
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
			require_once("dbaction/dbRetrieveInfo.php");
			require_once("printUtils.php");
			
			/*function printShowsAsOptions($shows) {
				foreach($shows as $show): ?>
					<option value=<?=$show['ShowID']?> ><?=$show['Title']?></option>
				<?php endforeach;
			}*/
			
			$showlist = getAllShows();
			
			/*//Print a datalist of all existing shows ?>
			<datalist id='allShowsList'>
				<?php printShowsAsOptions($showlist); ?>
			</datalist>
			
		<?php*/
			//If there was an error in the last action taken, it is sent to this page and displayed here
			if(isset($_POST["errmsg"])) {
		?>
		<div class="content-item error">
			<p><?= $_POST["errmsg"] ?></p>
		</div>
			<?php } ?>
		
		<div class="content-item">
			<div class="thumb-wrap">
			
				<h2>Manage Shows</h2>
				<div id='cssmenu'>
				<ul>
					<li class='has-sub'><span>Add Show</span>
						<ul>
							<form id="add-show" action="dbaction/createShow.php" method="post">
								<li>Title: <input id="show-title" type="text" name="show-title" required /></li>
								<li>Season: <?php printSeasonSelect("add-show"); ?></li>
								<li>Quarter: <?php printQuarterSelect("add-show"); ?> </li>
								<li id="err-msg" class="error"></li>
								<li><input class="button" id="add-show-button" type="submit" value="Create" /></li>
							</form>
						</ul>
					</li>
				   
					<li class='has-sub'><span>Add Short Plays</span>
						<ul>
							<form id="add-short-plays" action="dbaction/createShortPlays.php" method="post">
								<li>Season: <?php printSeasonSelect("add-short-plays"); ?></li>
								<li>Quarter: <?php printQuarterSelect("add-short-plays"); ?> </li>
								<li id="err-msg" class="error"></li>
								<li><input class="button" id="add-short-play-button" type="submit" value="Create" /></li>
							</form>
						</ul>
					</li>
				   
					<li class='has-sub'><span>Edit Show</span>
						<ul>
							<form action="editShow.php" id="editshow">
								<li><select id="show-select" name="showId" form="editshow">
										<?php foreach($showlist as $show): ?>
											<option value=<?=$show['ShowID']?> ><?=$show['Title']?></option>
										<?php endforeach; ?>
									</select></li>
								<li><input class="button" id="edit-show-button" type="submit" value="Edit" /></li>
							</form>
						</ul>
					</li>
					<li class='has-sub'><span>Edit Short Plays</span>
						<ul>
							<form id="edit-short-plays" >
								<li><?php printSeasonSelect("edit-short-plays"); ?></li>
								<li><?php printQuarterSelect("edit-short-plays"); ?></li>
								<li><input class="button" id="edit-short-play-button" type="submit" value="Edit" /></li>
							</form>
						</ul>
					</li>
				</ul>
				</div>
				
				<h2>Edit News Article</h2>
				<form action="newseditor.php" id="editnews">
					<select name="articleID" form="editnews">
						<option value="create">Add New Article</option>
					</select>
					<input class="button" type="submit" value="Go" />
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
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="scripts/accordion.js"></script>
<script src="scripts/admintools.js"></script>