<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Arrays</title>
</head>

<body>
    <?php
    $names_array = array(
        "Kevin",
        "Karen",
        "Oscar",
        "Jim"
    );

    echo ("Values: " . print_r($names_array) . "<br>");
    echo ("Value (2): $names_array[1] <br>");

    $names_array[1] = "Dwight";
    echo ("Value (2): $names_array[1] <br>");

    # note that arrays are not (necessarily) homogenous
    $names_array[1] = 400;
    echo ("Value (2): $names_array[1] <br>");

    $names_array[4] = "Angela";
    echo ("Value (5): $names_array[4] <br>");

    $names_array[9] = "Angela";
    echo ("Value (10): $names_array[9] <br>");

    echo ("Values: " . count($names_array) . "<br>");
    echo ("Values: " . print_r($names_array));
    ?>
</body>

</html>
