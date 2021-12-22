<!DOCTYPE html>

<?php
# assign each parameter its given value, or a default
$var_x = isset($_POST["var_x"]) ? $_POST["var_x"] : null;
$var_y = isset($_POST["var_y"]) ? $_POST["var_y"] : null;
$op = isset($_POST["op"]) ? $_POST["op"] : null;

# cache whether input was given
$has_input = (bool) !is_null($var_x)
    && !is_null($var_y)
    && !is_null($op);

# calculate the result based on user input
$res = null;
if ($op == "+") {
    $res = $var_x + $var_y;
} elseif ($op == "-") {
    $res = $var_x - $var_y;
} elseif ($op == "*") {
    $res = $var_x * $var_y;
} elseif ($op == "/") {
    # apply special handling for division by zero
    $res = $var_y == 0
        ? "undefined"
        : $var_x / $var_y;
}


$style = ($has_input && !is_null($res))
    ? "display:block"
    : "display:none";
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Calculator Improved</title>
</head>

<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Calculator</legend>

            <p>
                Enter two integer values, <em>X</em> and <em>Y</em>.
                Then, enter the desired <em>Operator</em>.
                Finally, click <em>Calculate</em>.
            </p>

            <label for="var_x">X:</label>
            <input name="var_x" type="number"><br>

            <label for="op">Op:</label>
            <input name="op" type="text" length="1"><br>

            <label for="var_y">Y:</label>
            <input name="var_y" type="number"><br><br>


            <input type="submit" value="Calculate">
        </fieldset>
    </form>

    <section style="<?= $style ?>">
        <hr>
        <strong>Output</strong><br>
        <?= "The result of $var_x $op $var_y is $res<br>" ?>
        <hr>
    </section>
</body>

</html>
