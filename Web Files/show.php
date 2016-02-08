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
			
			// memberArray represents an associative array of roles and names retrieved from the show information.
			// This function prints the names in a table format
			function printMembersAsTableRows($memberArray) {
				echo("<table>");
				foreach($memberArray as $role => $member) {
					echo("<tr><td>");
					echo($role);
					echo("</td><td>");
					echo($member);
					echo("</td></tr>");
				}
				echo("</table>");
			}
			
			//TODO figure out default behavior
			$showId = 0;
			if(isset($_GET["showId"])) {
				$showId = $_GET["showId"];
			}
			
			// Call getShowInfo with the show ID as a parameter. This retrieves all the information we have for that show.
			$information = getShowInfo($showId);
			$dates = getShowDates($showId);
			
			
			if(isset($information)) {
				if(isset($information['BannerURL'])) {
					// This assumes that banners and thumbnails will be stored in the ShowFront folder
					$bannerUrl = "ShowFront/" . $information['BannerURL'];
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
					<img alt='<?= $title ?>' src=<?= $bannerUrl ?>>
				<?php }
				else { ?>
					<h1><?= $title ?></h1>
				<?php } ?>
				</div>
			<?php } // Close title block ?>
		
		<div class="content-item">
			<?php // The performance dates for this show
			if(isset($information['Quarter'])) { ?>
				<p class="justified-text"> <?=$information['Quarter']?> Quarter</p>
			<?php }
			
			if(isset($dates)) { ?>
				<table>
					<?php
						foreach($dates as $date) {
							$timestamp = $date['DateTime'];
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
			if(isset($information['directors'])) { 
				printMembersAsTableRows($information['directors']);
			} 
			
			if(isset($information['actors'])) { ?>
				<h2>Cast</h2>
				<?php printMembersAsTableRows($information['actors']) ;
			}
			
			if(isset($information['crew'])) { ?>
				<h2>Crew</h2>
				<?php printMembersAsTableRows($information['crew']);
			}
			?>
		</div>		
	</div>
</body>
</html>