<?php
require_once 'includes/init.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log In</title>
	<!--<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">-->
</head>
<body>
	<!--<a href="/randonnee/read.php">Liste des données</a>-->
	<h1>Add User</h1>
	<form action="login.inc.php" method="post">
		<div>
			<label for="name">Username :</label>
			<input type="text" name="name" placeholder="Username/email...">
		</div>

		<div>
            <label for="pwd">Password :</label>
            <input type="password" name="pwd" placeholder="Password..."><br />
		</div>
		<button type="submit" name="submit">Log in</button>
	</form>
</body>
</html>