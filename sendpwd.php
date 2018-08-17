<?php

include 'connection.php';

if (isset($_POST['sendpwd'])) {

	$email = $_POST['email'];
	$errors = array();

	$datas = $database->select( 'users', [ 'email' ] );
	foreach ( $datas as $data ) {
		if ( $email == $data ['email'] ) {
			$str = 'qwertyuioplkjhgfdsa';
			$str = str_shuffle( $str );
			$str = substr( $str, 3, 9 );
			$url = "http://pixy.local/bei-ssh-vlad/passwordreset.php?token=$str";

			mail($email, "Reset Password", "To reset your password, please visit this link: $url", "From: secretsanta@lapland.com\r\n");

			$database->update( 'users', [ 'token' => $str ], ['email' => $email] );

		} else {
			array_push( $errors, "This e-mail address doesn't exist in our database." );
		}
	}
}