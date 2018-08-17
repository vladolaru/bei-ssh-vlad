<?php  include 'sendpwd.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SSH</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">

</head>

<body>
<section class="hero is-danger is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                SSH
            </h1>
            <h2 class="subtitle">
                Santa's Secret Helper
            </h2>
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

        <p class="title">Password Reset Email</p>

        <form action="" method="POST">

        <p class="subtitle">We will send you an email to the address below with the information needed for you to change the password.</p>
        <div class="content">

            <p class="subtitle has-text-danger">Your email address</p>

            <input class="input" type="email" name="email">
        </div>

        <div class="field is-grouped">

            <div class="control">
                <button type="submit" name="sendpwd" class="button is-link is-focused is-danger is-rounded">Send email</button>
                <button class="button is-text"><a href="login.php">Log into your account</a></button>
            </div>

        </div>

        </form>

    </article>

</section>
<footer>

</footer>
</body>
</html>