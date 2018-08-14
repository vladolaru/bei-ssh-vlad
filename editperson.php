<?php

include 'connection.php';

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

$database->insert('users', [
	'first_name' => $first,
	'last_name' => $last,
	'email' => $email,
	'password' => $password
]);

header("Location: list.php");