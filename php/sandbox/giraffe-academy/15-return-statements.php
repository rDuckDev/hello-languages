<!DOCTYPE html>

<?php

$number = isset($_GET["number"]) && is_numeric($_GET["number"])
    ? $_GET["number"]
    : null;

$style = is_null($number)
    ? "display:none"
    : "display:block";

// This function returns the cubed value of a given number.
// On invalid input, this function returns null.
function cube($value = null)
{
    if (!is_numeric($value))
        return null;

    $result = $value ** 3;

    return $result;
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Return Statements</title>
</head>

<body>
    <form action="15-return-statements.php" method="GET">
        <fieldset>
            <legend>Cuber</legend>

            <p>Enter a number to be cubed</p>

            <label for="number">Number:</label>
            <input name="number" type="number">

            <input type="submit">
        </fieldset>
    </form>

    <section style="<?= $style ?>">
        <hr>
        <strong>Output</strong><br>
        <?= "The cube of $number is " . cube($number) . ".<br>" ?>
        <hr>
    </section>
</body>

</html>
