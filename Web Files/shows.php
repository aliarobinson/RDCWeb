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
			require ("dateUtils.php");
			require ("dbaction/dbRetrieveInfo.php");
			
			function printDateSubtitle($showResult) {
				echo("<p class='show-subtitle'>");
				echo(getThumbnailDateFormat($showResult["StartDate"]));
				echo(" - ");
				echo(getThumbnailDateFormat($showResult["EndDate"]));
				echo(", ");
				echo($showResult["StartDate"]->format("Y"));
				echo("</p>");
			}
			
			$latestYear = 2015;
		?>
		
		<div class="content-item">
			<?php 
			$seasoninfo = getShowsByYear($latestYear); 
			$shortplayinfo = getShortPlaySetsInYear($latestYear); 
			?>
			<h1><?= getSeasonString($latestYear) ?></h1>
			<div class="wrapper">
				<?php
				foreach($seasoninfo as $show) { ?>
					<div class="showinfo">
						<h3><?=$show["Title"]?></h3>
						<a href='show.php?showId=<?=$show["ShowID"]?>'>
						<?php	if(isset($show["ThumbnailURL"])) { ?>
							<img class="thumbnail" src= 'dbaction/rdcphotos/<?= $show["ThumbnailURL"] ?>' alt='<?= $show["Title"] ?>' ></img>
							<?php } else { ?>
							<h2>Click for more information</h2>
							<?php }  ?>
						</a>
						<?php	
						printDateSubtitle($show); 
					?> </div> <?php
				}
				
				if(count($shortplayinfo) > 0) {
				?>
					<div class="showinfo">
						<h3>The <?= getSeasonString($latestYear) ?> Short Plays</h3>
						<img class="thumbnail" src="ShowFront/spsthumb.jpg" alt="The 2015-2016 Short Play Series">
						<p><?php 
							for($i = 0; $i < count($shortplayinfo) - 1; $i++) {
								echo($shortplayinfo[$i]["Quarter"]);
								echo(",");
							} 
							echo($shortplayinfo[count($shortplayinfo) - 1]["Quarter"]);
							?>
						</p></div> 
						<?php } ?>
				
				<!--div class="showinfo">
					<h3>Much Ado About Nothing</h3>
					<a href="show.php?showId=2"><img class="thumbnail" src="ShowFront/maanthumb.jpg" alt="Much Ado About Nothing"></a>
					<p>Oct 30 - Nov 7, 2015</p>
				</div>
				<div class="showinfo">
					<h3>Dancing at Lughnasa</h3>
					<a href="show.php?showId=1"><img class="thumbnail" src="ShowFront/dalthumb.jpg" alt="Dancing at Lughnasa"></a>
					<p>Jan 29 - Feb 6, 2016</p>
				</div>
			</div>
			<div class="wrapper">
				<div class="showinfo">
					<h3>West Side Story</h3>
					<a href="show.php?showId=3"><img class="thumbnail" src="ShowFront/wssthumb.jpg" alt="West Side Story"></a>
					<p>Apr 22 - Apr 30, 2016</p>
				</div>
				<div class="showinfo">
					<h3>The 2015-2016 Short Plays</h3>
					<img class="thumbnail" src="ShowFront/spsthumb.jpg" alt="The 2015-2016 Short Play Series">
					<p>Fall, Winter, Spring</p>
				</div-->
			</div>
		</div>
		
		<p>We're still working on archiving all of Rose Drama Club's past shows. Check back this fall to see the history of RDC!</p>
		
	</div>
</body>
</html>