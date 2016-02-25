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
			require ("dbaction/dbRetrieveInfo.php");
			require("printUtils.php");
			
			//TODO figure out default behavior
			$showId = 0;
			if(isset($_GET["showId"])) {
				$showId = $_GET["showId"];
			}
			
			// Call getShowInfo with the show ID as a parameter. This retrieves all the information we have for that show.
			$information = getShowInfo($showId);
			$logos = getShowLogos($showId);
			$dates = getShowDates($showId);
			$writers = getShowWriters($showId);
			$actors = getShowRoles($showId, "Actor");
			$crew = getShowRoles($showId, "Tech");
			$pit = getShowRoles($showId, "Pit");
			$directors = getShowRoles($showId, "Director");
			$production = getShowRoles($showId, "Production");
			$guests = getShowRoles($showId, "Guest");
			
			
			if(isset($information)) {
				if(isset($logos['Banner'])) {
					// This assumes that banners and thumbnails will be stored in the current directory + the given url
					$bannerUrl =  $logos['Banner'];
				}
				$title = $information['Title'];
			}
			else { // Gracefully handle error ?> 
				<div class="content-item">
					<p class="justified-text">No show information found.</p>
				</div>
		<?php	} 
		
			// Display the banner at the top of the page. If there is no banner, print the title
			if(isset($title)) { ?>
				<div class="content-item"> 
				<?php
				if(isset($bannerUrl)) { ?>
					<img alt='<?= $title ?>' src='dbaction/rdcphotos/<?= $bannerUrl ?>'>
				<?php }
				else { ?>
					<h1><?= $title ?></h1>
				<?php } ?>
				</div>
			<?php } // Close title block ?>
		
		<div class="content-item">
			<?php 
			// The writers for this show
			if(isset($writers)) {
				if(count($writers) == 1) {
					echo("<p>By ");
					echo($writers[0]["Name"]);
					echo("</p>");
				}
				else if(count($writers) > 1) {
					echo("<p>");
					for($i = 0; $i < count($writers) - 1; $i++) {
						echo($writers[$i]["Role"]);
						echo(" by ");
						echo($writers[$i]["Name"]);
						echo(", ");
					}
					echo($writers[count($writers) - 1]["Role"]);
					echo(" by ");
					echo($writers[count($writers) - 1]["Name"]);
					echo("</p>");
				}
				//If there are 0 writers, don't do anything
			}
			
			// The performance dates for this show
			if(isset($dates)) { ?>
				<table>
					<?php
						foreach($dates as $date) {
							$timestamp = $date['EventDate'];
							echo("<tr><td>");
							echo($timestamp->format("F j, Y"));
							echo("</td><td>");
							echo($timestamp->format("g:i A"));
							echo("</td></tr>");
						}
					?>
				</table>
			<?php } // Close performance date block ?>
			
			<!-- To be added in later on -->
			<!--p><a href="photos.php">View Photo Gallery</a></p-->
			
			<?php // Display a synopsis of the show
			if(isset($information['Synopsis'])) { ?>
				<p class="justified-text"><?=$information['Synopsis']?></p>
			<?php } // Close synopsis date block ?>
			
			<?php // Print the directors above the cast information. This typically will be one or two people. 
			if(isset($directors)) { 
				printMembersAsTableRows($directors, 1);
			} 
			
			if(isset($production)) { 
				printMembersAsTableRows($production, 2);
			} 
			
			if(isset($actors) && count($actors) > 0) { ?>
				<div class="thumb-wrap">
					<h2>Cast</h2>
					<?php printMembersAsTableRows($actors, 1); ?>
				</div>
			<?php }
			
			if(isset($crew) && count($crew) > 0) { ?>
				<div class="thumb-wrap">
					<h2>Crew</h2>
					<?php printMembersAsTableRows($crew, 1); ?>
				</div>
			<?php }
			
			if(isset($pit) && count($pit) > 0) { ?>
				<div class="thumb-wrap">
					<h2>Orchestra</h2>
					<?php printMembersAsNameList($pit); ?>
				</div>
			<?php }
			
			if(isset($guests) && count($guests) > 0) { ?>
				<div class="thumb-wrap">
					<h2>Special Thanks</h2>
					<?php printMembersAsNameList($guests); ?>
				</div>
			<?php }
			?>
		</div>		
	</div>
</body>
</html>