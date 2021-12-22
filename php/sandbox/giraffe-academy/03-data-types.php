<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Types</title>
</head>

<body>
    <?php
    // strings
    $str = "To be or not to be.";
    // integer
    $int = 35;
    // float
    $flt = 35.3;
    // boolean
    $bln = false;
    // null
    $nil = null;

    echo ("String: $str<br>");
    echo ("Integer: $int<br>");
    echo ("Decimal: $flt<br>");
    echo ("Boolean: " . ($bln ? "true" : "false") . "<br>");
    echo ("Null: " . (is_null($nil) ? "null" : $nil) . "<br>");
    ?>
</body>

</html>
