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
			include ("dateUtils.php");
			include ("dbaction/dbRetrieveInfo.php");
			
			function printDateSubtitle($showResult) {
				echo("<p class='show-subtitle'>");
				echo(getThumbnailDateFormat($showResult["StartDate"]));
				if($showResult["StartDate"] != $showResult["EndDate"]) {
					echo(" - ");
					echo(getThumbnailDateFormat($showResult["EndDate"]));
				}
				echo("</p>");
			}
			
			$currentseasoninfo = getCurrentAdvertisingSeason();
			foreach($currentseasoninfo as $show) {
				if(isAfterToday($show["StartDate"])) {
					$nextShow = $show;
				}
			}
			
			$curryear = $nextShow["StartDate"]->format("Y");
			
		?>
		
		<div class="content-item" id="next-show">
			<h1>Coming Up</h1>
				<a href='show.php?showId=<?=$nextShow["ShowID"]?>'>
				<?php
				if(isset($nextShow["BannerURL"])) { ?>
					<img class="show-prev-title" src= 'dbaction/rdcphotos/<?= $nextShow["BannerURL"] ?>' alt='<?= $nextShow["Title"] ?>' ></img>
					<?php } else { ?>
					<div class="show-prev-title"><h2><?= $nextShow["Title"] ?></h2></div>
					<?php } ?>
				</a>
			<?php
				printDateSubtitle($nextShow);
			?>
		</div>
		
		<div class="content-item" id="other-shows">
			<h1>Also This Season</h1>
			<div class="component-row">
			<?php
				foreach($currentseasoninfo as $show) {
					if($show != $nextShow) {  ?>
					<div class="third-wrap">
						<a href='show.php?showId=<?=$show["ShowID"]?>'>
						<?php	if(isset($show["ThumbnailURL"])) { ?>
							<img class="show-prev-wide" src= 'dbaction/rdcphotos/<?= $show["ThumbnailURL"] ?>' alt='<?= $show["Title"] ?>' ></img>
							<?php } else { ?>
							<div class="show-prev-title"><h2><?= $show["Title"] ?></h2></div>
							<?php }  ?>
						</a>
						<?php	printDateSubtitle($show); ?>
					</div> <?php
					}
				}
			?>
				<!--div class="third-wrap">
						<img class="show-prev-wide" src="ShowFront/maanthumb.jpg" alt="Much Ado About Nothing"></img>
						<p class="show-subtitle">October 30 - November 7</p>
					</div>
				<div class="third-wrap">
						<img class="show-prev-wide" src="ShowFront/wssthumb.jpg" alt="West Side Story"></img>
						<p class="show-subtitle">April 22 - April 30</p>
					</div-->
				<div class="third-wrap">
					<a href='shortplays.php?season=<?=$curryear?>' >
						<img class="show-prev-wide" src="ShowFront/spsthumb.jpg" alt="The Short Play Series"></img>
					</a>
					<p class="show-subtitle">Click for More Information</p>
				</div>
			</div>
		</div>
		
		<div class="content-item" id="newsfeed">
			<h1>What's New</h1>
			<div class="justified-text">
				<p>The Rose Drama Club is proud to announce the launch of our new website! We're still hard at work on new features and content, so be sure to check back periodically.</p>
			</div>
		</div>
		
	</div>
</body>
</html>