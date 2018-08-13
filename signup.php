<?php

include 'connection.php';

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);




//$_SESSION['first_name'] = $first;
//$_SESSION['success'] = "You are now logged in";


if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	header("Location: register.php?register=email");
	exit();
} else{
	$data = $database->select('users', ['email']);
	$dataCheck = mysqli_num_rows($data);

	if($dataCheck > 0){
		header("Location: register.php?register=usertaken");
		exit();
	}
	else{
		$database->insert( 'users',
			[
				'first_name' => $first,
				'last_name'  => $last,
				'email'      => $email,
				'password'   => $password
			] );
		header("Location: list.php");
	}
}
//else{
//	header("Location: register.php);
//	exit();
//}

