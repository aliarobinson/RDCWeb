<!DOCTYPE html>
<?php
	//This page should display a list of all short plays within one school year
	require("dbaction/dbRetrieveInfo.php");

	$showInfo = getShowInfo(1);
	
	//This prints the information for a single show
	function writeShowInformation($info) {
		echo("<div class='content-item'>");
		echo("<h3>" . $info['Title'] . "</h3>");
		
		echo("<div class='thumb-wrap'>");
		echo("<p class='justified-text'>" . $info['Synopsis'] . "</p>");
		echo("Directed by ");
		echo("<br>");
		echo("Written by ");
		echo("</div>");
		
		echo("<div class='thumb-wrap'>");
		echo("</div></div>");
	}
	
	//This prints a table with the names of the cast
	function printMembersAsTableRows($memberArray) {
		echo("<table>");
		foreach($memberArray as $mem) {
			echo("<tr><td>");
			echo($mem['Character']);
			echo("</td><td>");
			echo($mem['Name']);
			echo("</td></tr>");
		}
		echo("</table>");
	}
?>
<html lang="en">
<head>
  <title>The Short Play Series - Rose Drama Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
			
			echo("<h1>Winter 2016</h1>");
			writeShowInformation($showInfo);
			writeShowInformation($showInfo);
		?>
		
		
	</div>
</body>
</html>