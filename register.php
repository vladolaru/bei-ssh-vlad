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

        <p class="title has-text-centered has-text-dark">You are just one step away...</p>

        <form action="signup.php" method="POST">

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
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" required>
                </div>
            </div>

            <div class="field is-grouped is-pulled-right">
                <div class="control">
                    <button type="submit" name="register" class="button is-link is-focused is-danger is-rounded">Register</button>
                </div>
            </div>

            <button class="button is-text"><a href="login.php">Log into your account</a></button>

        </div>

        </form>

    </article>

</section>


<footer>

</footer>
</body>
</html>