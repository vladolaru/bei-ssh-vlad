<?php

session_start();
include 'connection.php';

if (isset($_POST['login'])) {

	$email    = $_POST['email'];
	$password = $_POST['password'];
	$errors = array();

	if ( empty( $email ) ) {
		array_push( $errors, "Email is required" );
	}
	if ( empty( $password ) ) {
		array_push( $errors, "Password is required" );
	}

	$datas = $database->select( 'users', [ 'email', 'password' ] );
	foreach ( $datas as $data ) {
		if ( $email == $data ['email'] && password_verify( $password, $data ['password'] ) ) {
			$_SESSION['email']   = $email;
			$_SESSION['success'] = "You are now logged in";
			header( 'location: list.php' );
			exit();
		} else {
			array_push( $errors, "The e-mail address or password are wrong" );
	}
	}
}
