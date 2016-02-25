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
</head>
<body>
	<div id="pagecontainer">
		
		<?php
			include ("header.html");
		?>
		
		<form id="photo-upload-form" enctype="multipart/form-data" method="post">
			<input type="file" id="photo-file-input" name="photo-file-input[]" multiple size="50">
			<input type="button" value="Upload" id="upload-button" >
		
		</form>
		<p id="upload-status"></p>
		<div id="photo-container" class="image-container">
		</div>
	</div>
</body>
</html>
<script src="scripts/photoUploader.js"></script>