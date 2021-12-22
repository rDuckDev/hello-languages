<!DOCTYPE html>

<?php
// HT: https://stackoverflow.com/questions/65603660/beginner-php-warning-undefined-array-key
// PHP 8.0+ shows warnings by default; the requested parameters are unset on an
// initial page load; so, check for parameters and (if necessary) assign defaults
$user_name = isset($_GET["user_name"]) ? $_GET["user_name"] : null;
$user_age = isset($_GET["user_age"]) ? $_GET["user_age"] : null;

// toggle the output state based on parameter values
$output_display = (is_null($user_name) || is_null($user_age))
    ? "none"
    : "block";
?>

<html>

<head>
    <meta charset="utf-8">
    <title>User Input</title>
</head>

<body>
    <form action="06-user-input.php" method="GET">
        <fieldset>
            <legend>Input</legend>

            <label for="user_name">Name:</label>
            <input id="user_name" name="user_name" type="text"><br>

            <label for="user_age">Age:</label>
            <input id="user_age" name="user_age" type="number"><br>

            <input type="submit">
        </fieldset>
    </form>
    <section style="display:<?= $output_display ?>;">
        <hr>
        <strong>Output</strong><br>
        Name: <?= $user_name ?><br>
        Age: <?= $user_age ?>
        <hr>
    </section>
</body>

</html>
