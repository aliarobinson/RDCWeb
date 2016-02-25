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
		
		<div class="content-item">
			<div class="thumb-wrap">
				<form action="dbaction/createAccount.php" method="post">
					<h3>Create new Account</h3>
					Username: <input type="text" name="username"></input><br>
					Password: <input type="password" name="pass1"></input><br>
					Confirm Password: <input type="password" name="pass2"></input><br>
					<input type="submit" value="Create"></input>
				</form>
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