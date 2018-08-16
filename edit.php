<?php
//include 'editperson.php';

session_start();

if (!isset($_SESSION['email'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['email']);
	header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SSH</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">

</head>

<body>

<section class="hero is-primary is-danger">

    <div class="hero-body">

        <div class="container">

			<?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
						<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
                    </h3>
                </div>
			<?php endif ?>


			<?php  if (isset($_SESSION['email'])) : ?>
                <p align="right">Hello, <strong><?php echo $_SESSION['email']; ?></strong></p>
                <p align="right"> <a href="login.php" style="color: white;">Logout</a> </p>
			<?php endif ?>


        </div>

        <div class="container">

            <h1 class="title">
                SSH
            </h1>

            <h2 class="subtitle">
                Santa's Secret Helper
            </h2>

        </div>

        <div class="control is-pulled-right">

            <button class="button is-link is-rounded has-background-success"><a href="list.php">Persons</a></button>
            <button class="button is-link is-rounded has-background-success"><a href="ssrounds.php">Rounds</a></button>

        </div>

    </div>

</section>

<p>&nbsp;</p>

<section class="container">

	<article class="tile is-child notification is-success">

		<p class="title">What is this person all about?</p>

		<form action="editperson.php" method="POST">

			<div class="columns">
				<div class="column is-half">
					<div class="field">
						<label class="label">First Name</label>
						<div class="control">
							<input class="input" type="text" name="first_name" required>
						</div>
					</div>
				</div>

				<div class="column is-half">
					<label class="label">Last Name</label>
					<div class="control">
						<input class="input" type="text" name="last_name" required>
					</div>
				</div>
			</div>

			<div class="content">
				<div class="field">
					<label class="label">Email Address</label>
					<div class="control">
						<input class="input" type="email" name="email" required>
					</div>
				</div>
				<div class="field">
					<label class="label">Personal Preferences</label>
					<div class="control">
						<textarea class="textarea" name="preferences"></textarea>
					</div>
				</div>
				<div class="field">
					<label class="label">Private notes about this person</label>
					<div class="control">
						<textarea class="textarea" name="private_notes"></textarea>
					</div>
				</div>

				<div class="field">
					<div class="control">
                        <button type="submit" name="editperson" class="button is-link is-focused is-danger is-rounded">Save person's details</button>
					</div>

					<div class="control">
						<button class="button is-text"><a href="list.php">Cancel</a></button>
					</div>
				</div>

			</div>

		</form>

	</article>

</section>


<footer>

</footer>
</body>
</html>