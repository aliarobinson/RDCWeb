<!DOCTYPE html>
<?php
	//This page should display a list of all short plays within one school year
	require("dbaction/dbRetrieveInfo.php");
	require("printUtils.php");

	$season = $_GET["season"];
	$sets = getShortPlaySetsInYear($season);
	
	//This prints the information for a single show
	function writeShowInformation($info) {
		$actors = getShowRoles($info["ShowID"], "Actor");
		$directors = getShowRoles($info["ShowID"], "Director");
		
		echo("<div class='content-item'>");
		echo("<h3>" . $info['Title'] . "</h3>");
		
		echo("<div class='thumb-wrap'>");
		echo("<p class='justified-text'>" . $info['Synopsis'] . "</p>");
		echo("Directed by ");
		printMembersAsNameList($directors);
		echo("<br>");
		echo("Written by ");
		//printMembersAsNameList($writers);
		echo("</div>");
		
		echo("<div class='thumb-wrap'>");
		printMembersAsTableRows($actors, 1);
		echo("</div></div>");
	}
?>
<html lang="en">
<head>
  <title>The Short Play Series - Rose Drama Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="styles/rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
			
			foreach($sets AS $set) {
				$setinfo = getShowsInShortPlaySet($set["SetID"]);
				$dates = getShowDates($set["SetID"]);
				echo("<h1>");
				echo($set['Quarter']);
				echo("</h1>");
				foreach($setinfo as $shortshow) {
					writeShowInformation($shortshow);
				}
			}
		?>
		
		
	</div>
</body>
</html>