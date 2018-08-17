<?php

include 'connection.php';
require_once '../bei-secret-santa-core/vlad/class-SecretSantaCore.php';


if (isset($_POST['sendemails'])) {

	$participants = $_POST['participants'];
	$budget       = $_POST['budget'];
	$subject      = $_POST['email_subject'];
	$from         = $_POST['email_from'];
	$content      = $_POST['email_content'];
	$errors       = array();

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
			'email_content' => $content,
			'created' => $today = date("m.d.y")
		] );
	}

	$santa = new SecretSantaCoreVlad();

	$santa->setEmailFrom($from);
	$santa->setEmailTitle($subject);
	$santa->setRecommendedExpenses($budget);
	$persons_details = [];
	foreach ( $participants as $person_id ) {
		$person = $database->select( 'persons', '*', [ 'id' => $person_id ] );
		if ( ! empty($person[0] ) ) {
			$person = $person[0];
		} else {
			continue;
		}
		$persons_details[] = [ $person['first_name'], $person['email'] ];
	}
	$santa->addUsers($persons_details);
	$santa->goRudolph();

	header( "Location: ssrounds.php" );
}

