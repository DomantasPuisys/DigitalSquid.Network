<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="../css/login.css" rel="stylesheet">
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Digital<span>Squid</span></div><br>
			<h5>Version 0.1</h5>
		</div>
		<br>
		<div class="login">
			<form method="post" action="login.php">
				<?php include('errors.php'); ?>
				<input type="text" placeholder="username" name="username"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="submit" name="login_user" value="Login">
			</form>
		</div>
</body>
</html>