<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Numbers</title>
</head>

<body>
    <?php
    // literal numbers
    echo ("Number (pos): " . 42 . "<br>");
    echo ("Number (neg): " . -24 . "<br>");
    echo ("Number (flt): " . 3.14 . "<br>");
    echo ("<hr>");

    // operator numbers
    $pi = M_PI;
    $e = M_E;
    echo ("Sum: $pi + $e = " . ($pi + $e) . "<br>");
    echo ("Diff: $pi - $e = " . ($pi - $e) . "<br>");
    echo ("Prod: $pi * $e = " . ($pi * $e) . "<br>");
    echo ("Quot: $pi / $e = " . ($pi / $e) . "<br>");
    // HT: https://stackoverflow.com/questions/13569164/php-modulo-decimal
    // PHP uses integers for modulo arithmetic, so use the `fmod` function
    echo ("Mod: $pi mod $e = " . fmod($pi, $e) . "<br>");
    echo ("Eqn: ($pi ^ 3) - (2 * $e) = " . $pi ** 3 - 2 * $e . "<br>");
    echo ("<hr>");

    // increment and decrement
    $num = 10;
    echo ("Number: $num<br>");
    $num++;
    echo ("Inc: $num<br>");
    $num--;
    echo ("Dec: $num<br>");
    $num += $num;
    echo ("Dbl: $num<br>");
    $num *= 3;
    echo ("Trp: $num<br>");
    echo ("<hr>");

    // math function
    echo ("abs(pi) = " . abs($pi) . "<br>");
    echo ("pi ^ 2 = " . pow($pi, 2) . "<br>");
    echo ("sqrt(144) = " . sqrt(144) . "<br>");
    echo ("max(pi, e) = " . max($pi, $e) . "<br>");
    echo ("min(pi, e) = " . min($pi, $e) . "<br>");
    echo ("round(pi, 2) = " . round($pi, 2) . "<br>");
    echo ("floor(pi) = " . floor($pi) . "<br>");
    ?>
</body>

</html>
