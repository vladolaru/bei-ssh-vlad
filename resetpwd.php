<?php include 'connection.php';

if (isset($_GET['email']) ) {
	$email = $_GET['email'];

	$data = $database->select( 'users', [ 'email' => $email ] );



} else {
	header( 'location: login.php' );
	exit();
};