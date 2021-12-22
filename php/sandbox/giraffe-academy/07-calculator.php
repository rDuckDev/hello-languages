<!DOCTYPE html>
<html>

<?php
// assign each parameter its given value, or a default
$var_x = isset($_GET["var_x"]) ? $_GET["var_x"] : 0;
$var_y = isset($_GET["var_y"]) ? $_GET["var_y"] : 0;

// special handling for division by zero
$quot = $var_y == 0
    ? "undefined"
    : $var_x / $var_y
?>

<head>
    <meta charset="utf-8">
    <title>Calculator</title>
</head>

<body>
    <form action="07-calculator.php" method="GET">
        <fieldset>
            <legend>Calculator</legend>

            <p>Enter two integer number, X and Y.</p>

            <label for="var_x">X:</label>
            <input name="var_x" type="number"><br>

            <label for="var_y">Y:</label>
            <input name="var_y" type="number"><br>
            <br>
            <input type="submit" value="Calculate">
        </fieldset>
    </form>
    <section>
        <hr>
        <strong>Output</strong><br>
        <?= $var_x . " + " . $var_y . " = " . ($var_x + $var_y) ?><br>
        <?= $var_x . " - " . $var_y . " = " . ($var_x - $var_y) ?><br>
        <?= $var_x . " * " . $var_y . " = " . ($var_x * $var_y) ?><br>
        <?= $var_x . " / " . $var_y . " = " . $quot ?>
        <hr>
    </section>
</body>

</html>
