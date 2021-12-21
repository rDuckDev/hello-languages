<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>URL Parameters</title>
</head>

<body>
    <form action="09-url-parameters.php" method="GET">
        <fieldset>
            <legend>URL Parameters</legend>

            <label for="name">Name:</label>
            <input name="name" type="text">

            <input type="submit">
        </fieldset>
    </form>

    <section>
        <hr>
        <strong>Output</strong><br>
        <?= isset($_GET["name"]) ? $_GET["name"] : "" ?><br>
        <?= isset($_GET["age"]) ? $_GET["age"] : "" ?>
        <hr>
    </section>
</body>

</html>
