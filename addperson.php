<?php

include 'connection.php';

if (isset($_POST['saveperson'])) {

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$preferences = $_POST['preferences'];
$private_notes = $_POST['private_notes'];
$errors = array();

	if ( empty( $first ) ) {
		array_push( $errors, "First name is required" );
	}
	if ( empty( $last ) ) {
		array_push( $errors, "Last name is required" );
	}
	if ( empty( $email ) ) {
		array_push( $errors, "Email is required" );
	}

    $datas = $database->select( 'persons', [ 'email' ] );
	foreach ( $datas as $data ) {
	if($email == $data ['email']) {
		array_push($errors, 'This person already exists in our database!');
	}
    }

if(count($errors) == 0) {

	$database->insert( 'persons', [
		'first_name'    => $first,
		'last_name'     => $last,
		'email'         => $email,
		'preferences'   => $preferences,
		'private_notes' => $private_notes
	] );
}

	header( "Location: list.php" );
}