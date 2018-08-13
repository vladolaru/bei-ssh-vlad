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

    <article class="tile is-child notification has-background-success">

        <p class="title has-text-centered">Get that Santa going...</p>

        <form action="signin.php" method="POST">

        <div class="content">

            <div class="field">
                <label class="label">Email</label>
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
        </div>

        <div class="control">
            <button type="submit" name="login" class="button is-link is-focused is-danger is-rounded">Login</button>
            <button class="button is-text is-pulled-right"><a href="register.php">Register a new account</a></button>
            <button class="button is-text is-pulled-right"><a href="forgot.php">Forgot your password?</a></button>
        </div>

        </form>

    </article>
</section>
<footer>

</footer>
</body>
</html>