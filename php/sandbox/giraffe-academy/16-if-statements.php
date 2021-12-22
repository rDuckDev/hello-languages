<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>If Statements</title>
</head>

<body>
    <?php
    # randomly assign two boolean values
    $is_happy = (bool) rand(0, 1);
    $has_coffee = (bool) rand(0, 1);

    # print the state of each boolean to contextualize the output
    echo ("\$is_happy = " . ($is_happy ? "true" : "false") . "<br>");
    echo ("\$has_coffee = " . ($has_coffee ? "true" : "false") . "<br><br>");

    if ($is_happy) {
        # cheerfully greet a happy user
        echo ("Have a wonderful day!");
    } elseif ($has_coffee) {
        # cheerfully greet an unhappy user with coffee
        echo ("Enjoy your coffee!");
    } else {
        # cautiously greet an unhappy user without coffee
        echo ("May your day improve.");
    }
    ?>
</body>

</html>
