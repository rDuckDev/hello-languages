<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>POST vs GET</title>
</head>

<body>
    <form action="10-post-vs-get.php" method="GET">
        <fieldset>
            <legend>GET Fields</legend>

            <label for="username">Username:</label>
            <input name="username" type="text">

            <input type="submit">
        </fieldset>
    </form>


    <form action="10-post-vs-get.php" method="POST">
        <fieldset>
            <legend>POST Fields</legend>

            <p>Never enter a real password!</p>

            <label for="password">Password:</label>
            <input name="password" type="password">

            <input type="submit">
        </fieldset>
    </form>

    <section>
        <hr>
        <strong>Output</strong><br>
        Your username is <?= isset($_GET["username"]) ? $_GET["username"] : "" ?><br>
        Your password is <?= isset($_POST["password"]) ? $_POST["password"] : "" ?>
        <hr>
    </section>
</body>

</html>
