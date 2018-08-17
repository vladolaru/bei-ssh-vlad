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

            <p class="title">Your Secret Santa players</p>
            <div class="content">

                <table>
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>E-mail Address</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                <?php

                $data = $database->select( 'persons', [ 'id', 'first_name', 'last_name', 'email' ] );

                foreach ($data as $key => $line) { ?>
                <tr>
                    <td><?php echo $line['first_name']; ?></td>
                    <td><?php echo $line['last_name']; ?></td>
                    <td><?php echo $line['email']; ?></td>

                    <td>
                        <button class="button is-link is-focused is-danger is-rounded"><a href="edit.php">Edit</a></button>
                        <button name="delete" class="button is-link is-focused is-danger is-rounded"><a href="http://pixy.local/bei-ssh-vlad/delete.php?email=<?php echo $line['email']; ?>">Delete</a></button>
                    </td>

                </tr>
	            <?php }
	             ?>

                    </tbody>
                </table>

                <div class="field is-grouped is-pulled-left">


                    <div class="control">
                        <button class="button is-link is-focused is-danger is-rounded"><a href="add.php">Add a new participant</a></button>
                    </div>

            </div>

            </div>

        </article>

    </div>

    </div>

</section>


<footer>

</footer>
</body>
</html>

