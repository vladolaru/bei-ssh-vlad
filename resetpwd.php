<?php include 'connection.php';


if (isset($_POST['setpwd'])) {

	$token = $_GET['token'];
	$user = $database->select( 'users', '*', [ 'token' => $token ] );
	if ( empty( $user[0] ) ) {
		die;
	}
	$user = $user[0];

	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];
	$errors = array();

	if ( empty( $password_1 ) ) {
		array_push( $errors, "Set your new password." );
	}
	if ( empty( $password_2 ) ) {
		array_push( $errors, "Set your new password." );
	}
	if ($password_1 != $password_2){
		array_push( $errors, "The passwords doesn't match." );
	}

	$password = $password_1;
	$password = password_hash($password, PASSWORD_DEFAULT);

	if ( count ($errors) == 0 ) {

		$database->update( 'users', [ 'password' => $password, 'token' => '' ], ['id' => $user['id']] );

		header( "Location: login.php" );
		exit();
	}
}
