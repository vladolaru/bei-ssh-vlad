<?php

include 'connection.php';

if (isset($_POST['login_user'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	 if (count($errors) == 0) {
		 $password = md5($password);
		 $data = $database->select('users', ['email', 'password']);
		 if ($data == 1) {
			 $_SESSION['first_name'] = $first;
			 $_SESSION['success'] = "You are now logged in";
			 header('location: list.php');
		 }else {
			 array_push($errors, "Wrong username or password!");
		 }
	 }
}
