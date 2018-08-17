<?php include 'connection.php';


	$email = $_GET['email'];

	$database->delete( 'persons', [ 'email[=]' => $email ] );

	header( 'location: list.php' );
