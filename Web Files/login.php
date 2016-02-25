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
		<div class="content-item">
			<form action="dbaction/authenticate.php" method="post">
				<h3>Login</h3>
				Username: <input type="text" name="username"></input><br>
				Password: <input type="password" name="password"></input><br>
				<input type="submit" value="Login"></input>
			</form>
		</div>
	</div>
</body>
</html>