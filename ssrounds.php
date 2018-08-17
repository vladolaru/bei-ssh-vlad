<?php include 'connection.php';

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


<section class="container">

    <div class="tile is-parent">

        <article class="tile is-child notification is-success">

            <p class="title">Your Secret Santa past rounds</p>



            <div class="content">

                <table>
                    <thead>
                    <tr>
                        <th>Round ID</th>
                        <th>Participants</th>
                        <th>Date</th>
                        <th>Budget</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

		            <?php

		            $data = $database->select( 'rounds', '*' );

		            foreach ($data as $key => $line) { ?>
                        <tr>
                            <td><?php echo $line['id']; ?></td>
                            <td><?php print_r(count(unserialize($line['participants']))); ?></td>
                            <td><?php echo $line['created']; ?></td>
                            <td><?php echo $line['budget']; ?></td>
                        </tr>
		            <?php }
		            ?>

                    </tbody>
                </table>

                <div class="field">

                    <div class="control">
                        <button class="button is-link is-danger is-rounded"><a href="newround.php">Add a new round</a></button>
                    </div>

            </div>

            </div>

        </article>

    </div>


</section>

<footer>

</footer>
</body>
</html>