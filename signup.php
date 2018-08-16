<?php

session_start();
include 'connection.php';

if (isset($_POST['register'])) {

	$first    = $_POST['first_name'];
	$last     = $_POST['last_name'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$password = password_hash( $password, PASSWORD_DEFAULT );
	$errors   = array();

	if ( empty( $first ) ) {
		array_push( $errors, "First name is required" );
	}
	if ( empty( $last ) ) {
		array_push( $errors, "Last name is required" );
	}
	if ( empty( $email ) ) {
		array_push( $errors, "Email is required" );
	}
	if ( empty( $password ) ) {
		array_push( $errors, "Password is required" );
	}

	$datas = $database->select( 'users', [ 'email' ] );
	foreach ( $datas as $data ) {
		if ( $email == $data ['email'] ) {
			array_push( $errors, 'This e-mail address already exists in our database!' );
		}
	}

	if ( count( $errors ) == 0 ) {

		$database->insert( 'users', [
			'first_name' => $first,
			'last_name'  => $last,
			'email'      => $email,
			'password'   => $password
		] );

		$_SESSION['email']   = $email;
		$_SESSION['success'] = "You are now logged in";

		header( "Location: list.php" );
	}
}
