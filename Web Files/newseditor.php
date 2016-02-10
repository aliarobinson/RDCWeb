<?php
	include("validateadmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>News Editor - Rose Drama Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="rosedramastyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
			require ("infoUtils.php");
			
			//Populate a datalist of all members
			printAllMembersDatalist();
		?>
		
		<div class="content-item left-aligned-text">
			<form action="dbaction/publishNewsItem.php" method="post">
				Title: <input type="text" name="articleTitle"></input>
				Article Author: <input type="text" name="articleAuthor" list="memberList"></input>
				<textarea name="newsItemEditor" id="newsItemEditor">
				</textarea>
				<input type="submit" value="Publish">
			</form>
		</div>
	</div>
</body>
</html>
<script src="ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('newsItemEditor');
</script>
