<?php
include 'sendround.php';

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

	        <?php
	        if(!empty($errors)){
		        foreach ($errors as $error) {
			        echo "<p class=\"has-text-danger\">$error</p>";
		        }
	        }
	        ?>

            <p class="title">Let's get this going</p>

            <form action="" method="POST">

            <div class="content">

                <div class="field">
                    <label class="label">Choose your participants</label>

                    <?php

	                $data = $database->select( 'persons', [ 'email' ] );

	                 ?>

                        <div class="select is-multiple">
                            <select multiple size="5">
                                <?php foreach ($data as $key => $line) { ?>
                                <option value='' name="participants" ><?php echo $line['email']; ?></option>
	                            <?php }
	                            ?>
                            </select>

                        </div>


                </div>


                <div class="field">
                    <label class="label">Recommended budget</label>
                    <div class="control">
                        <input class="input" type="text" name="budget">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Email subject (template)</label>
                    <div class="control">
                        <input class="input" type="text" name="email_subject">
                    </div>
                </div>

                <div class="field">
                    <label class="label">E-mail from</label>
                    <div class="control">
                        <input class="input" type="email" name="email_from">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Email content (template)</label>
                    <div class="control">
                        <textarea class="textarea" name="email_content"></textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" name="sendround" class="button is-link is-focused is-danger is-rounded">Send emails</button>
                    </div>

                    <div class="control">
                        <button class="button is-text"><a href="ssrounds.php">Cancel</a></button>
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