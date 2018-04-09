<?php
session_start();

// kol viskas kuriasi keiciu file permisions
// /users/ i 777
// server.php i 777
// sukurtas folderis
// d--------x  2 daemon daemon 4096 Kov 31 01:40 test2/

// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
include 'mysql.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password_1 = mysqli_real_escape_string($connect, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($connect, $_POST['password_2']);

	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($username)) {array_push($errors, "Username is required");}
	if (empty($email)) {array_push($errors, "Email is required");}
	if (empty($password_1)) {array_push($errors, "Password is required");}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// first check the database to make sure
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM vartotojai WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($connect, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if ($user) {
		// if user exists
		if ($user['username'] === $username) {
			array_push($errors, "Username already exists");
		}

		if ($user['email'] === $email) {
			array_push($errors, "email already exists");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1); //encrypt the password before saving in the database

		$query = "INSERT INTO vartotojai (username, email, password, type)
  			  VALUES('$username', '$email', '$password', 1)";
		mysqli_query($connect, $query);
		$_SESSION['username'] = $username;
		// sukuria folderi su $username folderyje /users
		mkdir('../users/' . $username, true);
		$_SESSION['success'] = "You are now logged in";
		header('location: dashboard.php');
	}
}

if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM vartotojai WHERE username='$username' AND password='$password'";
		$results = mysqli_query($connect, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: dashboard.php');
		} else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>