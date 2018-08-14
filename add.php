<?php
include 'addperson.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SSH</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">

</head>

<body>
<section class="container">

    <article class="tile is-child notification is-success">

	    <?php
	    if(!empty($errors)){
		    foreach ($errors as $error) {
			    echo "<p class=\"has-text-danger\">$error</p>";
		    }
	    }
	    ?>

        <p class="title">What is this person all about?</p>

        <form action="" method="POST">

        <div class="columns">
            <div class="column is-half">
            <div class="field">
                <label class="label">First Name</label>
                <div class="control">
                    <input class="input" type="text" name="first_name">
                </div>
            </div>
            </div>

            <div class="column is-half">
                <label class="label">Last Name</label>
                <div class="control">
                    <input class="input" type="text" name="last_name">
                </div>
            </div>
        </div>

        <div class="content">
            <div class="field">
                <label class="label">Email Address</label>
                <div class="control">
                    <input class="input" type="email" name="email">
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
                    <button type="submit" name="saveperson" class="button is-link is-focused is-danger is-rounded">Save person's details</button>
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