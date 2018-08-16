<?php

include 'connection.php';

if (isset($_POST['sendround'])) {

	$participants = $_POST['participants'];
	$budget = $_POST['budget'];
	$subject = $_POST['email_subject'];
	$from = $_POST['email_from'];
	$content = $_POST['email_content'];
	$errors = array();

	if ( empty( $participants ) ) {
		array_push( $errors, "You need at least 2 participants." );
	}
	if ( empty( $budget ) ) {
		array_push( $errors, "Budget is required!" );
	}
	if ( empty( $subject ) ) {
		array_push( $errors, "Your e-mail should have a subject!" );
	}
	if ( empty( $from ) ) {
		array_push( $errors, "Please fill in the E-mail from field." );
	}
	if ( empty( $content ) ) {
		array_push( $errors, "Please fill in the content." );
	}

	if ( count( $errors ) == 0 ) {

		$database->insert( 'rounds', [
			'participants'  => $participants,
			'budget'        => $budget,
			'email_subject' => $subject,
			'email_from'    => $from,
			'email_content' => $content
		] );
	}
	header( "Location: ssrounds.php" );
}

