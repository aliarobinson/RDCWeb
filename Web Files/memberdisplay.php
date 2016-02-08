<!DOCTYPE html>
<?php
	require ("dbaction/dbRetrieveInfo.php");
			
		$memberId = 0;
		if(isset($_GET["id"])) {
			$memberId = $_GET["id"];
		}
		
		// query info with the show ID as a parameter. This retrieves all the information we have for that show.
		$information = getMemberInfo($memberId);
		$roleinfo = getMemberRoles($memberId);
		
		// Prints the member's roles as a table
		function printRolesAsTable($rolesArray) {
			echo("<table>");
			foreach($rolesArray as $obj) {
				echo("<tr><td>");
				echo($obj['Name']);
				echo("</td><td>");
				echo("<a href=show.php?showId=" . $obj['ShowId']. " >");
				echo($obj['Title']);
				echo("</a>");
				echo("</td></tr>");
			}
			echo("</table>");
		}
?>
<html lang="en">
<head>
<?php //Print the member's name in the page title
if(isset($information['Name'])) { ?>
	<title><?=$information['Name'] ?> - Rose Drama Club</title>
<?php } else { ?>
	<title>Rose Drama Club Member</title>
<?php } ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
			
			
			if(!isset($information)) { // Gracefully handle error ?> 
				<div class="content-item">
					<p class="justified-text">No member information found.</p>
				</div>
			<?php } ?>
		
		<div class="content-item">
			<h2><?= $information['Name'] ?></h2>
			<img alt="<?= $information['Name'] ?>" src="url" />
			<p class="centered-text">Class of <?= $information['GradYear'] ?></p>
		</div>
		
		<?php
		if(isset($information['Bio'])) { ?>
			<div class="content-item">
				<p class="justified-text"><?= $information['Bio'] ?></p>
			</div>
		<?php } ?>
		
		<div class="content-item">
			<h2>Productions</h2>
			<?php printRolesAsTable($roleinfo); ?>
		</div>
		
	</div>
</body>
</html>