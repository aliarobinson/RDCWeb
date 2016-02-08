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
			<div class="thumb-wrap">
				<h3>Create new Account</h3>
				Username: <input type="text" id="username"></input><br>
				Password: <input type="password" id="pass1"></input><br>
				Confirm Password: <input type="password" id="pass2"></input><br>
				<input type="button" value="Create"></input>
			</div>
			<div class="thumb-wrap">
				<h3>Manage Account</h3>
				<select id="activeAccounts">
					<option>Select Account</option>
				</select>
				<div>
					<input type="button" value="Reset Password"></input>
					<input type="button" value="Deactivate Account"></input>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>